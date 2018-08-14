<?php

namespace App\Http\Controllers\Maintenance;

use Validator;
use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServicesController extends Controller
{

    public $viewBasePath = 'admin.maintenance.service';
    public $baseUrl = 'service';
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if( $request->ajax() ) {
            $services = Service::with('category')->get();
            return datatables($services)->toJson();
        }
        
        return view( $this->viewBasePath . '.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view( $this->viewBasePath . '.create')
                ->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Service $service)
    {
        $name = filter_var($request->get('name'), FILTER_SANITIZE_STRING);
        $description = filter_var($request->get('description'), FILTER_SANITIZE_STRING);
        $category = filter_var($request->get('category'), FILTER_VALIDATE_INT);
        $warranty = filter_var($request->get('warranty'), FILTER_VALIDATE_INT);
        $price = filter_var($request->get('price'), FILTER_VALIDATE_FLOAT);

        $validator = Validator::make( $request->all(), $service->rules());
        if($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $service = new Service;
        $service->name = $name;
        $service->description = $description;
        $service->category_id = $category;
        $service->warranty = $warranty;
        $service->price = $price;
        $service->save();

		session()->flash('notification', [
            'title' => 'Success!',
            'message' => 'You have created your service',
            'type' => 'success'
        ]);

        return redirect($this->baseUrl);
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
        $category = Category::where('id', '=', $id)->first();

        return view( $this->viewBasePath . '.show')
                ->with('category', $category);
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
        $service = Service::where('id', '=', $id)->first();
        $categories = Category::all();

        return view( $this->viewBasePath . '.edit')
                ->with('service', $service)
                ->with('categories', $categories);
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
        $name = filter_var($request->get('name'), FILTER_SANITIZE_STRING);
        $description = filter_var($request->get('description'), FILTER_SANITIZE_STRING);
        $category = filter_var($request->get('category'), FILTER_VALIDATE_INT);
        $warranty = filter_var($request->get('warranty'), FILTER_VALIDATE_INT);
        $price = filter_var($request->get('price'), FILTER_VALIDATE_FLOAT);

        $service = new Service;
        $service->name = $name;

        $validator = Validator::make([
            'name' => $name,
            'description' => $description,
            'service' => $id,
            'warranty' => $warranty,
            'price' => $price,
            'category' => $category
        ], $service->updateRules());

        if($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $service = Service::find($id);
        $service->name = $name;
        $service->description = $description;
        $service->category_id = $category;
        $service->warranty = $warranty;
        $service->price = $price;
        $service->save();

		session()->flash('notification', [
            'title' => 'Success!',
            'message' => 'You have successfully updated a service',
            'type' => 'success'
        ]);

        return redirect($this->baseUrl);
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
        $service = new Service;

        $validator = Validator::make([
            'service' => $id
        ], $service->checkIfServiceExists());

        if($validator->fails()) {
            
            if( $request->ajax() ) {
                return response()->json([
                    'title' => 'Error',
                    'message' => 'Error occured while updating a service',
                    'status' => 'ok',
                    'others' => '',
                ], 500);
            }
            return back()->withInput()->withErrors($validator);
        }

        $service = Service::find($id);
        $service->delete();

        if( $request->ajax() ) {
            return response()->json([
                'title' => 'Success',
                'message' => 'Service successfully removed',
                'status' => 'ok',
                'others' => '',
            ], 200);
        }

        session()->flush('success', 'Service successfully removed');
        return redirect($this->baseUrl);
    }
}
