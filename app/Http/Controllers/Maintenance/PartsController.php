<?php

namespace App\Http\Controllers\Maintenance;

use Validator;
use App\Part;
use App\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartsController extends Controller
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
            $parts = Part::with('vehicle')->get();
            return datatables($parts)->toJson();
        }
        
        return view( $this->viewBasePath . '.part.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehicles = Vehicle::all();
        return view( $this->viewBasePath . '.part.create')
                ->with('vehicles', $vehicles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Part $part)
    {
        $part_number = filter_var($request->get('part_number'), FILTER_SANITIZE_STRING);
        $model = filter_var($request->get('model'), FILTER_VALIDATE_INT);
        $part_location = filter_var($request->get('part_location'), FILTER_SANITIZE_STRING);
        $description = filter_var($request->get('description'), FILTER_SANITIZE_STRING);
        $price = filter_var($request->get('price'), FILTER_VALIDATE_FLOAT);

        $validator = Validator::make( $request->all(), $part->rules());
        if($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $part = new Part;
        $part->part_number = $part_number;
        $part->vehicle_id = $model;
        $part->part_location = $part_location;
        $part->description = $description;
        $part->price = $price;
        $part->save();

		session()->flash('notification', [
            'title' => 'Success!',
            'message' => 'You have added a part_number',
            'type' => 'success'
        ]);

        return redirect('part');
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
        $part = Part::where('id', '=', $id)->first();
        $vehicles = Vehicle::all();

        return view( $this->viewBasePath . '.part.edit')
                ->with('part', $part)
                ->with('vehicles', $vehicles);
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
        $part_number = filter_var($request->get('part_number'), FILTER_SANITIZE_STRING);
        $model = filter_var($request->get('model'), FILTER_VALIDATE_INT);
        $part_location = filter_var($request->get('part_location'), FILTER_SANITIZE_STRING);
        $description = filter_var($request->get('description'), FILTER_SANITIZE_STRING);
        $price = filter_var($request->get('price'), FILTER_VALIDATE_FLOAT);

        $part = new part;
        $part->part_number = $part_number;

        $validator = Validator::make([
            'part_number' => $part_number,
            'part' => $id,
            'model' => $model,
            'part_location' => $part_location,
            'description' => $description,
            'price' => $price

        ], $part->updateRules());

        if($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $part = Part::find($id);
        $part->part_number = $part_number;
        $part->vehicle_id = $model;
        $part->part_location = $part_location;
        $part->description = $description;
        $part->price = $price;
        $part->save();

		session()->flash('notification', [
            'title' => 'Success!',
            'message' => 'You have successfully updated a Part Number',
            'type' => 'success'
        ]);

        return redirect('part');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $part_number = filter_var($request->get('part_number'), FILTER_SANITIZE_STRING);
        $description = filter_var($request->get('description'), FILTER_SANITIZE_STRING);
        $part = new Part;

        $validator = Validator::make([
            'part' => $id
        ], $part->checkIfPartsExists());

        if($validator->fails()) {
            
            if( $request->ajax() ) {
                return response()->json([
                    'title' => 'Error',
                    'message' => 'Error occured while updating a part',
                    'status' => 'ok',
                    'others' => '',
                ], 500);
            }
            return back()->withInput()->withErrors($validator);
        }

        $part = part::find($id);
        $part->delete();

        if( $request->ajax() ) {
            return response()->json([
                'title' => 'Success',
                'message' => 'Part successfully removed',
                'status' => 'ok',
                'others' => '',
            ], 200);
        }

        session()->flush('part number', 'Service successfully removed');
        return redirect('part');
    }
}
