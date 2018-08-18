<?php

namespace App\Http\Controllers\Maintenance;

use Validator;
use App\Model\Vehicle;
use App\Model\Vehicle\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VehiclesController extends Controller
{

  public $viewBasePath = 'admin.maintenance.vehicle.category';
  public $baseUrl = 'vehicle/category';

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
      if( $request->ajax() ) {
          $vehicles = Vehicle::with('vehicles')->get();
          return datatables($vehicles)->toJson();
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
      return view( $this->viewBasePath . '.create')
                ->with('transmission_types', Category::$transmission_types);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request, Category $vehicle)
  {
      
      $brand = filter_var($request->get('brand'), FILTER_SANITIZE_STRING);
      $model = filter_var($request->get('model'), FILTER_SANITIZE_STRING);
      $year_made = filter_var($request->get('year_made'), FILTER_SANITIZE_STRING);
      $size = filter_var($request->get('size'), FILTER_SANITIZE_STRING);
      $transmission = filter_var($request->get('transmission'), FILTER_SANITIZE_STRING);

      $validator = Validator::make( $request->all(), $vehicle->rules());
      if($validator->fails()) {
          return back()->withInput()->withErrors($validator);
      }

      $vehicle = new Category;
      $vehicle->brand = $brand;
      $vehicle->model = $model;
      $vehicle->year_made = $year_made;
      $vehicle->size = $size;
      $vehicle->transmission_type = $transmission;
      $vehicle->save();

  session()->flash('notification', [
          'title' => 'Success!',
          'message' => 'You have created your a vehicle category',
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
      $category = Categroy::where('id', '=', $id)->first();

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
              ->with('category', $category)
              ->with('transmission_types', Category::$transmission_types);
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
      $brand = filter_var($request->get('brand'), FILTER_SANITIZE_STRING);
      $model = filter_var($request->get('model'), FILTER_SANITIZE_STRING);
      $year_made = filter_var($request->get('year_made'), FILTER_SANITIZE_STRING);
      $size = filter_var($request->get('size'), FILTER_SANITIZE_STRING);
      $transmission = filter_var($request->get('transmission'), FILTER_SANITIZE_STRING);
      $category = Category::find($id);

      $validator = Validator::make([
          'brand' => $brand,
          'model' => $model,
          'year_made' => $year_made,
          'size' => $size,
          'transmission' => $transmission
      ], $category->updateRules());

      if($validator->fails()) {
          return back()->withInput()->withErrors($validator);
      }

      $category->brand = $brand;
      $category->model = $model;
      $category->year_made = $year_made;
      $category->size = $size;
      $category->transmission_type = $transmission;
      $category->save();

    session()->flash('notification', [
          'title' => 'Success!',
          'message' => 'You have successfully updated a vehicle category',
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
      $brand = filter_var($request->get('brand'), FILTER_SANITIZE_STRING);
      $model = filter_var($request->get('model'), FILTER_SANITIZE_STRING);
      $vehicle = Category::find($id);

      $validator = Validator::make([
          'category' => $id
      ], $vehicle->checkIfCategoryExists());

      if($validator->fails()) {
          
          if( $request->ajax() ) {
              return response()->json([
                  'title' => 'Error',
                  'message' => 'Error occured while updating a vehicle',
                  'status' => 'ok',
                  'others' => '',
              ], 500);
          }
          return back()->withInput()->withErrors($validator);
      }

      $vehicle->delete();

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
