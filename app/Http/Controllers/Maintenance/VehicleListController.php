<?php

namespace App\Http\Controllers\Maintenance;

use Validator;
use Illuminate\Http\Request;
use App\Models\Vehicle\Lists;
use App\Http\Controllers\Controller;

class VehicleListController extends Controller
{

    public $viewBasePath = 'admin.maintenance.vehicle.list';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if( $request->ajax() ) {
            $vehicles = Lists::all();
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
            ->with('transmission_types', Lists::$transmission_types);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Lists $vehicle)
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

        $vehicle = new Lists;
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

        return redirect('vehicle/list');
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
        $list = Lists::where('id', '=', $id)->first();

        return view( $this->viewBasePath . '.show')
                ->with('list', $list);
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
        $list = Lists::where('id', '=', $id)->first();

        return view( $this->viewBasePath . '.edit')
                ->with('list', $list)
                ->with('transmission_types', Lists::$transmission_types);
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
        $list = Lists::find($id);

        $validator = Validator::make([
            'brand' => $brand,
            'model' => $model,
            'year_made' => $year_made,
            'size' => $size,
            'transmission' => $transmission
        ], $list->updateRules());

        if($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $list->brand = $brand;
        $list->model = $model;
        $list->year_made = $year_made;
        $list->size = $size;
        $list->transmission_type = $transmission;
        $list->save();

		session()->flash('notification', [
            'title' => 'Success!',
            'message' => 'You have successfully updated a vehicle category',
            'type' => 'success'
        ]);

        return redirect('vehicle/list');
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
        $vehicle = Lists::find($id);

        $validator = Validator::make([
            'list' => $id
        ], $vehicle->checkIfListExists());

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
                'message' => 'Category List successfully removed',
                'status' => 'ok',
                'others' => '',
            ], 200);
        }

        session()->flush('success', 'Category List successfully removed');
        return redirect('vehicle');
    }
}
