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
