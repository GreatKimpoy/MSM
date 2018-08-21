@extends('admin.layouts.app')



@section('content-header')


<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
      <h1 class="float-left">Job Order</h1>
      <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active">Job Order</li>
      </ol>
  </div><!-- /.container-fluid -->
</section>


@endsection


@section('content-body')

  
    <section class="content-header">
      <div class="container-fluid">
      	<div class="card col-sm-12 mt-3">
      		<div class="card-block pt-3">
        			<div class="card-header">
        				<a href="{{url('joborder/create')}}" type="button" id="new" class="btn btn-success pull-right"><i class="fa fa-plus"> NEW RECORD</i></a>
        			</div>
              <div class="card-body">
                <div class="job-status">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-header">
                                    Job Status
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-card-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"> <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                              <div class="card-body" id="status">
                                <button type="button" id="start" class="btn btn-info btn-block" > Started </button>
                                <button type="button" id="Final" class="btn btn-warning btn-block" > Finalized </button>
                                <button type="button" id="Paid" class="btn btn-primary btn-block" > Paid </button>
                                <button type="button" id="Done" class="btn btn-success btn-block" > Done </button>
                                <button type="button" id="Released" class="btn btn-dark btn-block" > Released </button>
                              </div>
                            </div>

                            <div class="card">
                              <div class="card-header">
                                <h3 id="dateView" class="card-title">{{date('F j, Y')}}</h3>
                                  <div class="card-tools">
                                        <button type="button" class="btn btn-card-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"> <i class="fa fa-minus"></i>
                                        </button>
                                  </div>
                              </div>
                              <div class="card-body">
                                <button id="viewTable" class="btn btn-info btn-block" href="#tabularTab" aria-controls="tabularTab" role="tab" data-toggle="tab">
                                <i class="fa fa-exchange-alt"></i> Tabular View
                                </button>
                                <button id="viewCalendar" class="btn btn-info btn-block" href="#calendarTab" aria-controls="calendarTab" role="tab" data-toggle="tab">
                                    <i class="fa fa-exchange-alt"></i> Calendar View
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- CALENDAR/DATATABLE --}}
                    <div class="col-sm-9">

                      <div class="tab-content">
                          {{-- CALENDAR--}}
                          <div role="tabpanel" class="tab-pane fade show active" id="calendarTab">
                              <div class="card card-primary">
                                  <div class="card-body no-padding">
                                      <div id="calendars"></div>
                                  </div>
                              </div>
                          </div>
                            {{-- DATATABLE --}}
                            <div role = "tabpanel" class="tab-pane fade show" id="tabularTab">
                              <table id="list" class="table table-striped table-bordered responsive">
                                  <thead>
                                    <tr>
                                       <th>Vehicle</th>
                                       <th>Customer</th>
                                       <th class="text-right">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                   


                                 </tbody>
                              </table>
                            </div>

                      </div>

                    </div>
                </div>
              </div>
      		</div>
      	</div>
      </div>
    </section>



@endsection

