<?php

namespace App\Http\Controllers\Maintenance;

use Validator;
use App\Category;
use App\Mechanic;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MechanicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
   		$mechanics = Mechanic::join('service_categories', 'service_categories.CategoryId', '=', 'mechanics.CategoryId')
           ->select('MechanicId', 'strFirstName', 'strMiddleName', 'strLastName', 'strCategoryName', 'strContact')
           ->orderBy('MechanicId', 'desc')
           ->get();

       $specializations = Category::all();
       return view('admin.maintenance.mechanic.index')
                 ->with('mechanics', $mechanics)
                 ->with('specializations', $specializations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.maintenance.mechanic.create')
                ->with('specializations', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('image');
        $imageUploaded = "";
        $firstname = trim($request->strFirstName);
        $middlename = trim($request->strMiddleName);
        $lastname = trim($request->strLastName);
        $street = trim($request->txtStreet);
        $barangay = trim($request->txtBrgy);
        $city = trim($request->txtCity);
        $birthdate = Carbon::parse( $request->get('dtmBirthdate') );
        $categoryId = filter_var( $request->CategoryId, FILTER_VALIDATE_INT);
        $contact = trim($request->strContact);
        $email = trim($request->strEmail);


        $validator = Validator::make(
            $request->all(), 
            Mechanic::rules(), 
            Mechanic::messages()
        );

        $validator->setAttributeNames( Mechanic::attributeName() ); 

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput($request->except('image'));
        }

        try{
            DB::beginTransaction();

            if($file == '' || $file == null) {
                $imageUploaded = "pics/steve.jpg";
            }else {
                $date = date("Ymdhis");
                $extension = $request->file('image')->getClientOriginalExtension();
                $imageUploaded = "pics/$date.$extension";
                $request->file('image')->move("pics", $imageUploaded);    
            }

            $mechanic = new Mechanic;
            $mechanic->strFirstName = $firstname;
            $mechanic->strMiddleName = $strMiddleName;
            $mechanic->strLastName = $lastname;
            $mechanic->txtStreet = $street;
            $mechanic->txtBarangay = $barangay;
            $mechanic->txtCity = $city;
            $mechanic->dtmBirthdate = $birthdate;
            $mechanic->strContact = $contact;
            $mechanic->strEmail = $email;
            $mechanic->image = $imageUploaded;
            $mechanic->idSpec = $categoryId;
            $mechanic->save();
                
            DB::commit();
        } catch( \Illuminate\Database\QueryException $e ) {
            DB::rollback();
            $errMess = $e->getMessage();
            return Redirect::back()->withErrors($errMess);
        }


        $request->session()->flash('success', 'Technician successfully added');  
        return Redirect('/admin/maintenance/mechanic/mechanics');
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
