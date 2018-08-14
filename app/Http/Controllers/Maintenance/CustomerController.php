<?php

namespace App\Http\Controllers\Maintenance;

use Validator;
use App\Person;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{

    public $viewBasePath = 'admin.maintenance';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if( $request->ajax() ) {
            $customers = Person::customer()->get();
            return datatables($customers)->toJson();
        }
        
        return view( $this->viewBasePath . '.customer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( $this->viewBasePath . '.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Category $category)
    {
        $name = filter_var($request->get('name'), FILTER_SANITIZE_STRING);
        $description = filter_var($request->get('description'), FILTER_SANITIZE_STRING);

        $validator = Validator::make( $request->all(), $category->rules());
        if($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $customer = new Person;
        $customer->name = $name;
        $customer->description = $description;
        $customer->save();

		session()->flash('notification', [
            'title' => 'Success!',
            'message' => 'You have created a customer',
            'type' => 'success'
        ]);

        return redirect('customer');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = filter_var( $id, FILTER_VALIDATE_INT);
        $customer = Category::where('id', '=', $id)->first();

        return view( $this->viewBasePath . '.customer.show')
                ->with('customer', $customer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = filter_var( $id, FILTER_VALIDATE_INT);
        $customer = Category::where('id', '=', $id)->first();

        return view( $this->viewBasePath . '.customer.edit')
                ->with('customer', $customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = filter_var( $id, FILTER_VALIDATE_INT);
        $name = filter_var($request->get('name'), FILTER_SANITIZE_STRING);
        $description = filter_var($request->get('description'), FILTER_SANITIZE_STRING);
        $customer = Category::find($id);

        $validator = Validator::make([
            'name' => $name,
            'description' => $description,
            'customer' => $id
        ], $customer->updateRules());

        if($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $customer = Category::find($id);
        $customer->name = $name;
        $customer->description = $description;
        $customer->save();

		session()->flash('notification', [
            'title' => 'Success!',
            'message' => 'You have successfully updated a customer',
            'type' => 'success'
        ]);

        return redirect('customer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $name = filter_var($request->get('name'), FILTER_SANITIZE_STRING);
        $description = filter_var($request->get('description'), FILTER_SANITIZE_STRING);
        $customer = Category::find($id);

        $validator = Validator::make([
            'customer' => $id
        ], $customer->checkIfCategoryExists());

        if($validator->fails()) {
            
            if( $request->ajax() ) {
                return response()->json([
                    'title' => 'Error',
                    'message' => 'Error occured while updating a customer',
                    'status' => 'ok',
                    'others' => '',
                ], 500);
            }
            return back()->withInput()->withErrors($validator);
        }

        $customer = Person::find($id);
        $customer->delete();

        if( $request->ajax() ) {
            return response()->json([
                'title' => 'Success',
                'message' => 'Category successfully removed',
                'status' => 'ok',
                'others' => '',
            ], 200);
        }

        session()->flush('success', 'Category successfully removed');
        return redirect('customer');
    }
}
