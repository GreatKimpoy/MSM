<?php

namespace App\Http\Controllers\Transaction;

use DB;
use Validator;
use App\Person;
use App\Inspection;
use App\VehiclePerson;
use App\InspectionItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InspectionController extends Controller
{
    public $viewBasePath = 'admin.transaction';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view( $this->viewBasePath . '.inspection.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inspection_items = InspectionItem::all();
        return view( $this->viewBasePath . '.inspection.create')
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
        $customer = VehiclePerson::addVehicle($request->all());

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
