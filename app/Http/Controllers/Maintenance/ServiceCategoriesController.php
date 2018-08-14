<?php

namespace App\Http\Controllers\Maintenance;

use Validator;
use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceCategoriesController extends Controller
{

    public $viewBasePath = 'admin.maintenance.service.category';
    public $baseUrl = 'service/category';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if( $request->ajax() ) {
            $categories = Category::all();
            return datatables($categories)->toJson();
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
        return view( $this->viewBasePath . '.create');
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

        $category = new Category;
        $category->name = $name;
        $category->description = $description;
        $category->save();

		session()->flash('notification', [
            'title' => 'Success!',
            'message' => 'You have created your category',
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
        $category = Category::where('id', '=', $id)->first();

        return view( $this->viewBasePath . '.edit')
                ->with('category', $category);
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
        $category = Category::find($id);

        $validator = Validator::make([
            'name' => $name,
            'description' => $description,
            'category' => $id
        ], $category->updateRules());

        if($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $category = Category::find($id);
        $category->name = $name;
        $category->description = $description;
        $category->save();

		session()->flash('notification', [
            'title' => 'Success!',
            'message' => 'You have successfully updated a category',
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
        $category = Category::find($id);

        $validator = Validator::make([
            'category' => $id
        ], $category->checkIfCategoryExists());

        if($validator->fails()) {
            
            if( $request->ajax() ) {
                return response()->json([
                    'title' => 'Error',
                    'message' => 'Error occured while updating a category',
                    'status' => 'ok',
                    'others' => '',
                ], 500);
            }
            return back()->withInput()->withErrors($validator);
        }
        $category->delete();

        if( $request->ajax() ) {
            return response()->json([
                'title' => 'Success',
                'message' => 'Category successfully removed',
                'status' => 'ok',
                'others' => '',
            ], 200);
        }

        session()->flush('success', 'Category successfully removed');
        return redirect($this->baseUrl);
    }
}
