<?php

namespace App\Http\Controllers\Maintenance;

use Validator;
use App\Vehicle;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VehiclesController extends Controller
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
            $vehicles = Vehicle::all();
            return datatables($vehicles)->toJson();
        }
        
        return view( $this->viewBasePath . '.vehicle.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( $this->viewBasePath . '.vehicle.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Vehicle $vehicle)
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

        $vehicle = new Vehicle;
        $vehicle->brand = $brand;
        $vehicle->model = $model;
        $vehicle->year_made = $year_made;
        $vehicle->size = $size;
        $vehicle->transmission = $transmission;
        $vehicle->save();

		session()->flash('notification', [
            'title' => 'Success!',
            'message' => 'You have created your vehicle',
            'type' => 'success'
        ]);

        return redirect('vehicle');
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
        $vehicle = Vehicle::where('id', '=', $id)->first();

        return view( $this->viewBasePath . '.vehicle.show')
                ->with('vehicle', $vehicle);
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
        $vehicle = vehicle::where('id', '=', $id)->first();

        return view( $this->viewBasePath . '.vehicle.edit')
                ->with('vehicle', $vehicle);
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
        
        $vehicle = new Vehicle;

        $vehicle->model = $model;

        $validator = Validator::make([
            'brand' => $brand,
            'model' => $model,
            'year_made' => $year_made,
            'size' => $size,
            'transmission' => $transmission
        ], $vehicle->updateRules());

        if($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $vehicle = Vehicle::find($id);
        $vehicle->brand = $brand;
        $vehicle->model = $model;
        $vehicle->year_made = $year_made;
        $vehicle->size = $size;
        $vehicle->transmission = $transmission;
        $vehicle->save();

		session()->flash('notification', [
            'title' => 'Success!',
            'message' => 'You have successfully updated a vehicle',
            'type' => 'success'
        ]);

        return redirect('vehicle');
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
        $vehicle = new Vehicle;

        $validator = Validator::make([
            'vehicle' => $id
        ], $vehicle->checkIfVehicleExists());

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

        $vehicle = Vehicle::find($id);
        $vehicle->delete();

        if( $request->ajax() ) {
            return response()->json([
                'title' => 'Success',
                'message' => 'Vehicle successfully removed',
                'status' => 'ok',
                'others' => '',
            ], 200);
        }

        session()->flush('success', 'Vehicle successfully removed');
        return redirect('vehicle');
    }
}
