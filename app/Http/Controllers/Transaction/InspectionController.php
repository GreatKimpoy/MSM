<?php

namespace App\Http\Controllers\Transaction;

use DB;
use Validator;
use App\Models\Person;
use App\Models\Vehicle;
use App\Models\Inspection;
use Illuminate\Http\Request;
use App\Models\Inspection\Items;
use App\Http\Controllers\Controller;

class InspectionController extends Controller
{
    public $viewBasePath = 'admin.transaction.inspection';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
          if( $request->ajax() ) {
            $inspection_items =  Items::all();
            return datatables($inspection_items)->toJson();
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
        $inspection_items = Items::all();
        return view( $this->viewBasePath . '.create')
                ->with('inspection_items', $inspection_items);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request, Inspection $inspection)
    {
        return $request->all();

        DB::beginTransaction();
        $customer = Person::addCustomer($request->all());
        $vehicle = Vehicle::addVehicle($request->all());

        $inspection = new Inspection;
        $inspection->save();

        $inspection->items->attach();
        DB::commit();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
