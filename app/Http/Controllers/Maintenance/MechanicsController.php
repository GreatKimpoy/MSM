<?php

namespace App\Http\Controllers\Maintenance;

use DB;
use Validator;
use App\Person;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MechanicsController extends Controller
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
            $mechanics = Person::mechanic()->get();
            return datatables($mechanics)->toJson();
        }
        return view( $this->viewBasePath . '.mechanic.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view( $this->viewBasePath . '.mechanic.create')
                ->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lastname = filter_var($request->get('lastname'), FILTER_SANITIZE_STRING);
        $firstname = filter_var($request->get('firstname'), FILTER_SANITIZE_STRING);
        $middlename = filter_var($request->get('middlename'), FILTER_SANITIZE_STRING);
        $street = filter_var($request->get('street'), FILTER_SANITIZE_STRING);
        $barangay = filter_var($request->get('barangay'), FILTER_SANITIZE_STRING);
        $city = filter_var($request->get('city'), FILTER_SANITIZE_STRING);
        $birthdate = filter_var($request->get('birthdate'), FILTER_SANITIZE_STRING);
        $contact = filter_var($request->get('contact'), FILTER_SANITIZE_STRING);
        $email = filter_var($request->get('email'), FILTER_SANITIZE_STRING);
        $type = filter_var($request->get('type'), FILTER_SANITIZE_STRING);
        $specializations = $request->get('specializations');
        $mechanic = new Person;

        $validator = Validator::make( $request->all(), $mechanic->mechanicRules());
        if($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $mechanic->lastname = $lastname;
        $mechanic->firstname = $firstname;
        $mechanic->middlename = $middlename;
        $mechanic->barangay = $barangay;
        $mechanic->city = $city;
        $mechanic->street = $street;
        $mechanic->birthdate = $birthdate;
        $mechanic->contact = $contact;
        $mechanic->email = $email;
        $mechanic->type = $type;

        DB::beginTransaction();
        $mechanic->save();
        $mechanic->categories()->attach($specializations);
        DB::commit();

		session()->flash('notification', [
            'title' => 'Success!',
            'message' => 'You have created a user information',
            'type' => 'success'
        ]);

        return redirect('mechanic');
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
        $mechanic = Person::mechanic()->where('id', '=', $id)->first();

        return view( $this->viewBasePath . '.mechanic.show')
                ->with('mechanic', $mechanic);
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
        $mechanic = Person::mechanic()->where('id', '=', $id)->first();

        $categories = Category::all();
        return view( $this->viewBasePath . '.mechanic.edit')
                ->with('mechanic', $mechanic)
                ->with('categories', $categories);
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
        $id = filter_var( $id, FILTER_VALIDATE_INT);
        $lastname = filter_var($request->get('lastname'), FILTER_SANITIZE_STRING);
        $firstname = filter_var($request->get('firstname'), FILTER_SANITIZE_STRING);
        $middlename = filter_var($request->get('middlename'), FILTER_SANITIZE_STRING);
        $street = filter_var($request->get('street'), FILTER_SANITIZE_STRING);
        $barangay = filter_var($request->get('barangay'), FILTER_SANITIZE_STRING);
        $city = filter_var($request->get('city'), FILTER_SANITIZE_STRING);
        $birthdate = filter_var($request->get('birthdate'), FILTER_SANITIZE_STRING);
        $contact = filter_var($request->get('contact'), FILTER_SANITIZE_STRING);
        $email = filter_var($request->get('email'), FILTER_SANITIZE_STRING);
        $type = filter_var($request->get('type'), FILTER_SANITIZE_STRING);
        $specializations = $request->get('specializations');
        $mechanic = Person::find($id);

        $validator = Validator::make( $request->all() + [ 'mechanic' => $id ], $mechanic->mechanicUpdateRules());
        if($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $mechanic->lastname = $lastname;
        $mechanic->firstname = $firstname;
        $mechanic->middlename = $middlename;
        $mechanic->barangay = $barangay;
        $mechanic->city = $city;
        $mechanic->street = $street;
        $mechanic->birthdate = $birthdate;
        $mechanic->contact = $contact;
        $mechanic->email = $email;
        $mechanic->type = $type;

        DB::beginTransaction();
        $mechanic->save();
        $mechanic->categories()->sync($specializations);
        DB::commit();

        session()->flash('notification', [
            'title' => 'Success!',
            'message' => 'You have update a mechanics information',
            'type' => 'success'
        ]);

        return redirect('mechanic');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $name = filter_var($request->get('name'), FILTER_SANITIZE_STRING);
        $description = filter_var($request->get('description'), FILTER_SANITIZE_STRING);
        $category = new Category;

        $validator = Validator::make([
            'category' => $id
        ], $category->checkIfCategoryExists());

        if($validator->fails()) {
            
            if( $request->ajax() ) {
                return response()->json([
                    'title' => 'Error',
                    'message' => 'Error occured while updating a category',
                    'status' => 'ok',
                    'others' => '',
                ], 500);
            }
            return back()->withInput()->withErrors($validator);
        }

        $category = Category::find($id);
        $category->delete();

        if( $request->ajax() ) {
            return response()->json([
                'title' => 'Success',
                'message' => 'Mechanic successfully removed',
                'status' => 'ok',
                'others' => '',
            ], 200);
        }

        session()->flush('success', 'Mechanic successfully removed');
        return redirect('category');
    }
}
