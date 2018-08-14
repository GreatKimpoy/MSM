<?php

namespace App\Http\Controllers\Maintenance;

use App\Appointments;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

use Calendar;

class AppointmentsController extends Controller
{
    public $viewBasePath = 'admin.maintenance';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if( $request->ajax() ) {
            $appointments =  Appointments::all();
            return datatables($appointments)->toJson();
        }

        return view( $this->viewBasePath . '.appointments.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $appointments = Appointments::all();
        $appointment_list= [];
        foreach ($appointments as $key => $appointment) {
            # code...
            $appointment_list[] = Calendar::event( 
                $appointment->appointment_name,
                true,
                new \DateTime($appointment->appointment_startDate),
                new \DateTime($appointment->appointment_endDate.'+1 day')
            );
                
        }
        $calendar_details = Calendar::addEvents($appointment_list);

        return view( $this->viewBasePath . '.appointments.create', compact('calendar_details'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Appointments $appointments)
    {
        //
        $appointment_name = filter_var($request->get('appointment_name'), FILTER_SANITIZE_STRING);
        $appointment_start= filter_var($request->get('appointment_start'), FILTER_SANITIZE_STRING);
        $appointment_End= filter_var($request->get('appointment_end'), FILTER_SANITIZE_STRING);

        $validator = Validator::make( $request->all(), $appointments->rules());
        if($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }


        if ($validator -> fails()) {
            \Session::flash('warning', 'ENTER VALID INFORMATION!!');
            return Redirect::to('appointments')->withInput();
        }


        $appointment = new Appointments;
        $appointment->appointment_name = $appointment_name;
        $appointment->appointment_startDate= $appointment_start;
        $appointment->appointment_endDate= $appointment_End;
        $appointment->save();


        session()->flash('notification', [
            'title' => 'Success!',
            'message' => 'SERVICE APPOINTMENT ADDED SUCCESSFULLY!',
            'type' => 'success'
        ]);
          return Redirect ('appointments');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //


        return view( $this->viewBasePath . '.appointments.create');
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
    public function destroy(Request $request, $id)
    {
        //

        $appointment_name = filter_var($request->get('appointment_name'), FILTER_SANITIZE_STRING);
        $appointment_start= filter_var($request->get('appointment_start'), FILTER_SANITIZE_STRING);
        $appointment_End= filter_var($request->get('appointment_end'), FILTER_SANITIZE_STRING);

        $appointment = new Appointments;

        $validator = Validator::make([
            'appointments' => $id
        ], $appointment->checkIfAppointmentExists());

        if($validator->fails()) {
            
            if( $request->ajax() ) {
                return response()->json([
                    'title' => 'Error',
                    'message' => 'Error occured while deleting appointment',
                    'status' => 'ok',
                    'others' => '',
                ], 500);
            }
            return back()->withInput()->withErrors($validator);
        }

        $appointment = Appointments::find($id);
        $appointment->delete();

        if( $request->ajax() ) {
            return response()->json([
                'title' => 'Success',
                'message' => 'Appoinment successfully removed',
                'status' => 'ok',
                'others' => '',
            ], 200);
        }

        session()->flush('Success', 'Category successfully removed');
        return redirect('appointments');
    }
}
