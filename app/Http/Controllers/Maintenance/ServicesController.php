<?php

namespace App\Http\Controllers\Maintenance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.   
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::join('service_categories', 
            'service_categories.CategoryId', '=', 'services.CategoryId')
            ->select('strServiceName', 'strCategoryName', 'strServiceDescription', 'fltPrice')
            ->orderBy('ServiceId', 'desc')
            ->get();
        $specializations = Category::all();
        return view('admin.maintenance.service.index-service', ['services' => $services, 
                  'specializations' => $specializations]);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specializations = service_category::all();
        return view('admin.maintenance.service.create-service', ['specializations' => $specializations]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
