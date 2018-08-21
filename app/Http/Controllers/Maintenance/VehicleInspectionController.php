<?php

namespace App\Http\Controllers\Maintenance;

use Validator;
use App\Models\InspectionType;
use App\Models\InspectionItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

use DB;

class VehicleInspectionController extends Controller
{

  public $viewBasePath = 'admin.maintenance.vehicle.inspect';

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $inspections = InspectionType::all(); 
    return View($this ->viewBasePath.'.index', compact('inspections'));


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
  public function store(Request $request)
  {
   
    $rules = [
        'type' => ['required','max:50','unique:inspection_types','regex:/^[^~`!@#*_={}|\;<>,.?]+$/'],
        'item.*' => ['required','max:50','regex:/^[^~`!@#*_={}|\;<>,.?]+$/'],
        'inspectionForm.*' => 'required'
    ];
    $messages = [
        'unique' => ':attribute already exists.',
        'required' => 'The :attribute field is required.',
        'max' => 'The :attribute field must be no longer than :max characters.',
        'regex' => 'The :attribute must not contain special characters.'                
    ];
    $niceNames = [
        'type' => 'Type',
        'item.*' => 'Item',
        'inspectionForm.*'=>'Form'
    ];
    $validator = Validator::make($request->all(),$rules,$messages);
    $validator->setAttributeNames($niceNames); 
    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }
    else{
        try{
            DB::beginTransaction();
            $type = InspectionType::create([
                'type' => trim($request->type),
            ]);
            $items = $request->item;
            $forms = $request->inspectionForm;
            foreach ($items as $key=>$item) {
                InspectionItem::create([
                    'name' => $item,
                    'form' => $forms[$key],
                    'type_id' => $type->id,
                ]);
            }
            DB::commit();
        }catch(\Illuminate\Database\QueryException $e){
            DB::rollBack();
            $errMess = $e->getMessage();
            return Redirect::back()->withErrors($errMess);
        }
        $request->session()->flash('success', 'Successfully added.');  
        return redirect('vehicle/inspect');
      
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
            $type = InspectionType::findOrFail($id);
            return View($this ->viewBasePath.'.edit', compact('type'));
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
    $rules = [
        'type' => ['required','max:50',Rule::unique('inspection_types')->ignore($id),'regex:/^[^~`!@#*_={}|\;<>,.?]+$/'],
        'item.*' => ['required','max:50','regex:/^[^~`!@#*_={}|\;<>,.?]+$/'],
        'inspectionForm.*' => 'required'
    ];
    $messages = [
        'unique' => ':attribute already exists.',
        'required' => 'The :attribute field is required.',
        'max' => 'The :attribute field must be no longer than :max characters.',
        'regex' => 'The :attribute must not contain special characters.'                
    ];
    $niceNames = [
        'type' => 'Type',
        'item.*' => 'Item',
        'inspectionForm.*'=>'Form'
    ];
    $validator = Validator::make($request->all(),$rules,$messages);
    $validator->setAttributeNames($niceNames); 
    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }
    else{
        try{
            DB::beginTransaction();
            $type = InspectionType::findOrFail($id);
            $type->update([
                'type' => trim($request->type),
            ]);
            InspectionItem::where('typeId',$id);
            $items = $request->item;
            $forms = $request->inspectionForm;
            foreach ($items as $key=>$item) {
                InspectionItem::updateOrCreate(
                    ['name' => $item,'type_id' => $type->id],
                    ['form'=>$forms[$key],'isActive' => 1]
                );
            }
            DB::commit();
        }catch(\Illuminate\Database\QueryException $e){
            DB::rollBack();
            $errMess = $e->getMessage();
            return back()->withErrors($errMess);
        }
        $request->session()->flash('success', 'Successfully updated.'); 
        return redirect('vehicle/inspect');
    }
      
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
