<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\vehicleType;
use App\Mechanic;
use App\service_category;
use App\Service;
use App\Part;

use Validator;
use Redirect;
use Session;
use DB;
use Illuminate\Validation\Rule;

class MaintenanceController extends Controller
{
    //
    public function maintainMechanics()
   	{	
   		$mechanics = Mechanic::join('service_categories', 
          'service_categories.CategoryId', '=', 'mechanics.CategoryId')
          ->select('MechanicId', 'strFirstName', 'strMiddleName', 'strLastName', 'strCategoryName', 'strContact')
          ->orderBy('MechanicId', 'desc')
          ->get();
      $specializations = service_category::all();
      return view('admin.maintenance.mechanic.index-mechanic', ['mechanics' => $mechanics, 
                'specializations' => $specializations]);;

   	}






    public function maintainServices()
    { 
      $services = Service::join('service_categories', 
          'service_categories.CategoryId', '=', 'services.CategoryId')
          ->select('strServiceName', 'strCategoryName', 'strServiceDescription', 'fltPrice')
          ->orderBy('ServiceId', 'desc')
          ->get();
      $specializations = service_category::all();
      return view('admin.maintenance.service.index-service', ['services' => $services, 
                'specializations' => $specializations]);;



    }

    public function createService(){
      $specializations = service_category::all();
      return view('admin.maintenance.service.create-service', ['specializations' => $specializations]);

    }

    public function addService(Request $request){
      $this->validate($request, [
          'strServiceName' => 'required',
          'strServiceDescription' => 'nullable',
          'fltPrice' => 'required',
          'idSpec' => 'required',
          'strValidity' => 'required',
      ]);

      // Save to database
      $services = new Service;
      $services->strServiceName = $request->input('strServiceName');
      $services->strServiceDescription = $request->input('strDescription');
      $services->strfltPrice = $request->input('strYearMade');
      $services->CategoryId = $request->input('idSpec');
      $services->strValidity = $request->input('strValidity');

      if ($services->save()) {
        return redirect('admin.maintenance.service.index-service')->with('success', 'Vehicle added!');
      }
    }

    public function maintainParts()
    { 
      $parts = Part::join('vehicle_types', 
          'vehicle_types.VehicleId', '=', 'parts.VehicleId')
          ->select('strPartNo', 'strModelName', 'strPartLocation', 'fltPartPrice', 'strPartDescription')
          ->orderBy('strModelName', 'desc')
          ->get();
      $vehicletypes = vehicleType::all();
      return view('admin.maintenance.part.index-part', ['parts' => $parts, 
                'vehicletypes' => $vehicletypes]);;



    }
    public function createTechnician(){    
      
      $specializations = service_category::all();
      return view('admin.maintenance.mechanic.create-mechanic', ['specializations' => $specializations]);
     
    }

    public function addMechanicForm(Request $request)
    {
      $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,svg',
            'strFirstName' => ['required','max:45'],
            'strMiddleName' => ['nullable','max:45'],
            'strLastName' => ['required','max:45'],
            'txtStreet' => 'required|max:140',
            'txtBrgy' => 'required|max:140',
            'txtCity' => 'required|max:140',
            'strContact' => ['required','max:30','regex:/^[^_]+$/'],
            'strEmail' => 'nullable|email|unique:mechanics|max:100',
            'idSpec' => 'required'
      ]);
      $mechanic = new Mechanic;
      $mechanic->CategoryId = $request->input('idSpec');
      $mechanic->strFirstName = $request->input('strFirstName');
      $mechanic->strMiddleName = $request->input('strMiddleName');
      $mechanic->strLastName = $request->input('strLastName');
      $mechanic->txtStreet = $request->input('txtStreet');
      $mechanic->txtBrgy = $request->input('txtBrgy');
      $mechanic->txtCity = $request->input('txtCity');

      // <img src="public/images/profile/{{ $mechanic->image }}">
      // upload image
      if ($request->hasFile('image')) {
        // Get filename with extension
        $fileNameWithExt = $request->file('image')->getClientOriginalName();
        // Get the filename only
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        // Get the file's extension only
        $fileExt = $request->file('image')->getClientOriginalExtension();
        // create full filename
        $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
        // upload the file
        $path = $request->file('image')->storeAs('public/images/profile', $fileNameToStore);
      } else {
        $fileNameToStore = 'default_profile_img.png';
      }
      $mechanic->image = $fileNameToStore;
      $mechanic->dtmBirthdate = $request->input('dtmBirthdate');
      $mechanic->strContact = $request->input('strContact');
      $mechanic->strEmail = $request->input('strEmail');
      
      if($mechanic->save()){
        return redirect('/admin/maintenance/mechanic/mechanics');
      }
    }

    public function viewMechanic($id)
    {
      $mechanic = Mechanic::findOrFail($id);
      return view('admin.maintenance.mechanic.view-mechanic', ['mechanic' => $mechanic]);
    }
    public function addMechanic(Request $request)
    {
        $rules = [
            'image' => 'image|mimes:jpeg,png,jpg,svg',
            'strFirstName' => ['required','max:45'],
            'strMiddleName' => ['nullable','max:45'],
            'strLastName' => ['required','max:45'],
            'txtStreet' => 'required|max:140',
            'txtBrgy' => 'required|max:140',
            'txtCity' => 'required|max:140',
            'strContact' => ['required','max:30','regex:/^[^_]+$/'],
            'strEmail' => 'nullable|email|unique:mechanics|max:100',
            'idSpec' => 'required'
        ];
        $messages = [
            'strFirstName.unique' => 'Name is already taken',
            'required' => 'The :attribute field is required.',
            'max' => 'The :attribute field must be no longer than :max characters.',
            'regex' => 'The :attribute must not contain special characters.'                
        ];
        $niceNames = [
            'image' => 'Technician Photo',
            'strFirstName' => 'First Name',
            'strMiddleName' => 'Middle Name',
            'strLastName' => 'Last Name',
            'txtStreet' => 'No. & St./Bldg.',
            'txtBrgy' => 'Brgy./Subd.',
            'txtCity' => 'City/Municipality',
            'strContact' => 'Contact No.',
            'strEmail' => 'Email Address',
            'idSpec' => 'Technician Skill(s)'
        ];

        $validator = Validator::make($request->all(),$rules,$messages);
        $validator->setAttributeNames($niceNames); 
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->except('image'));
        }
        else{
            try{
                DB::beginTransaction();
                $file = $request->file('image');
                $techPic = "";
                if($file == '' || $file == null){
                    $techPic = "pics/steve.jpg";
                }else{
                    $date = date("Ymdhis");
                    $extension = $request->file('image')->getClientOriginalExtension();
                    $techPic = "pics/".$date.'.'.$extension;
                    $request->file('image')->move("pics",$techPic);    
                }
                $dtmBirthdate = explode('/',$request->dtmBirthdate); // MM[0] DD[1] YYYY[2] 
                $finalBirthDate = "$dtmBirthdate[2]-$dtmBirthdate[0]-$dtmBirthdate[1]";
                $tech = Mechanic::create([
                    'strFirstName' => trim($request->strFirstName),
                    'strMiddleName' => trim($request->strMiddleName),
                    'strLastName' => trim($request->strLastName),
                    'txtStreet' => trim($request->txtStreet),
                    'txtBarangay' => trim($request->txtBrgy),
                    'txtCity' => trim($request->txtCity),
                    'dtmBirthdate' => $finalBirthDate,
                    'strContact' => trim($request->strContact),
                    'strEmail' => trim($request->strEmail),
                    'image' => $techPic,
                    'idSpec' => ($request->CategoryId),
                ]);
                 
                
                
                DB::commit();
            }catch(\Illuminate\Database\QueryException $e){
                DB::rollBack();
                $errMess = $e->getMessage();
                return Redirect::back()->withErrors($errMess);
            }


            $request->session()->flash('success', 'Successfully added.');  
            return Redirect('/admin/maintenance/mechanic/mechanics');
        }
    }
  

    //VEHICLES
   	public function maintainVehicles()
   	{
   		$vehicles = vehicleType::all();
   		return view('admin.maintenance.vehicle.index-vehicle', ['vehicles' => $vehicles]);
   	}




    //vehicles

    public function createVehicles(){    
      return view('admin.maintenance.vehicle.create-vehicle');
    }


    public function addVehicle(Request $request)
    {
      // Form validation
      $this->validate($request, [
          'strBrand' => 'required',
          'strModelName' => 'nullable',
          'strYearMade' => 'required',
          'strSize' => 'required',
          
      ]);

      // Save to database
      $vehicles = new VehicleType;
      $vehicles->strBrand = $request->input('strBrand');
      $vehicles->strModelName = $request->input('strModelName');
      $vehicles->strYearMade = $request->input('strYearMade');
      $vehicles->strSize = $request->input('strSize');
      $vehicles->hasAuto = $request->input('hasAuto');
      $vehicles->hasManual = $request->input('hasManual');
      
      if ($vehicles->save()) {
        return redirect('admin.maintenance.vehicle.vehicles')->with('success', 'Vehicle added!');
      }
    }


    

    

   

    //CATEGORY

    public function maintainServiceCategory()
    {
      $service_categories = service_category::all();
      return view('admin.maintenance.category.index-category', ['service_categories' => $service_categories]);
    }
    
     public function AddCategory(Request $request)
    {
      $this->validate($request, [
          'strCategoryName' => 'required',
          'strDescription' => 'nullable',
       
      ]);

      // Save to database
      $service_categories = new service_category;
      $service_categories->strCategoryName = $request->input('strCategoryName');
      $service_categories->strDescription = $request->input('strDescription');
      if ($service_categories->save()) {
        return redirect('admin/maintenance/category/categories')->with('success', 'Mechanic added!');
      }
    }



}
