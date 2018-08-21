<?php

namespace App\Http\Controllers\Transaction;

use DB;
use Validator;
use Session;
use App\Models\Customer;
use App\Models\Vehicle;
use App\Models\Inspection;
use Illuminate\Http\Request;
use App\Models\InspectionItem;
use App\Models\InspectionHeader;
use App\Models\InspectionTechnician;
use App\Http\Controllers\Controller;
use App\Models\Technician;

class InspectionController extends Controller
{
    public $viewBasePath = 'admin.transaction.inspection';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $inspects = DB::table('inspections as i')
            ->join('customers as c','c.id','i.customer_id')
            ->join('vehicles as v','v.id','i.vehicle_id')
            ->join('vehicle_models as vd','vd.id','v.vehicle_id')
            ->select('i.*','i.id as inspect_id','c.*','v.*','vd.*')
            ->get();
         return View($this ->viewBasePath.'.index', compact('inspects'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = InspectionItem::all();
        $customers = DB::table('customers')
            ->select('customers.*')
            ->get();
        $autos = DB::table('vehicle_models as vd')
            ->select('vd.*')
            ->get();
        $manuals = DB::table('vehicle_models as vd')
            ->select('vd.*')
            ->get();
        $technicians = Technician::all();
        return View($this ->viewBasePath.'.create',compact('items','customers','autos','manuals','technicians'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request, Inspection $inspection)
    {
        $rules = [
            'firstname' => 'required|max:45',
            'middlename' => 'required|nullable',
            'lastname' => 'required|max:45',
            'contact' => 'required|max:30',
            'email' => 'required|nullable|email|max:100',
            'street' => 'required|nullable|max:140',
            'barangay' => 'required|nullable|max:140',
            'city' => 'required|max:140',
            'plate' => 'required',
            'modelId' => 'required',
            'technician.*' => 'required',
            'remarks' => 'max:140',
            'form.*' => 'required',
            'item.*' => 'required'
        ];
        $messages = [
            'unique' => ':attribute already exists.',
            'required' => 'The :attribute field is required.',
            'max' => 'The :attribute field must be no longer than :max characters.',
            'regex' => 'The :attribute must not contain special characters.'                
        ];
        $niceNames = [
            'firstName' => 'First Name',
            'middleName' => 'Middle Name',
            'lastName' => 'Last Name',
            'contact' => 'Contact No.',
            'email' => 'Email Address',
            'street' => 'No. & St./Bldg.',
            'barangay' => 'Brgy./Subd.',
            'city' => 'City/Municipality',
            'plate' => 'Plate No.',
            'modelId' => 'Vehicle Model',
            'technician.*' => 'Technician Assigned',
            'remarks' => 'Remarks',
            'form.*' => 'Form',
            'item.*' => 'Item'
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        $validator->setAttributeNames($niceNames); 
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        else{
            try{
         
                 DB::beginTransaction();
                $customer = Customer::updateOrCreate(
                    [
                        'firstname' => trim($request->firstname),
                        'middlename' => trim($request->middlename),
                        'lastname' => trim($request->lastname)
                    ],[
                        'contact' => str_replace('_','',trim($request->contact)),
                        'email' => $request->email,
                        'street' => trim($request->street),
                        'barangay' => trim($request->barangay),
                        'city' => trim($request->city)
                    ]
                );
                $model = $request->modelId;
                $vehicle = Vehicle::updateOrCreate(
                    ['plate_number' => str_replace('_','',trim($request->plate))],
                    [
                        'vehicle_id' => $model,
                    ]
                );
                $inspection = Inspection::create([
                    'customer_id' => $customer->id,
                    'vehicle_id' => $vehicle->id,
                    'additional_remarks' => trim($request->remarks)
                ]);
                $forms = $request->form;
                $items = $request->itemId;
                foreach($items as $key=>$item){
                    InspectionHeader::create([
                        'inspection_id' => $inspection->id,
                        'item_id' => $item,
                        'remarks' => $forms[$key],
                    ]);
                }
                $technicians = $request->technician;
                foreach($technicians as $technician){
                    InspectionTechnician::create([
                        'inspection_id' => $inspection->id,
                        'technician_id' => $technician,
                    ]);
                }
                DB::commit();
            }catch(\Illuminate\Database\QueryException $e){
                DB::rollBack();
                $errMess = $e->getMessage();
                return back()->withErrors($errMess);
            }
            $request->session()->flash('success', 'Successfully added.');  
         
           return redirect('inspection');
    
        }
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
