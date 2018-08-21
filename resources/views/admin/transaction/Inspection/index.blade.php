@extends('admin.layouts.app')

@section('content-header')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
      <h1 class="float-left">Inspection</h1>
      <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active">Inspection</li>
      </ol>
  </div><!-- /.container-fluid -->
</section>
@endsection

@section('content-body')
    <section class="content-header">
      <div class="container-fluid">
        <div class="card col-sm-12 mt-3">
          <div class="card-block pt-3">
            <div class="card-body">
              <a type="button" id="new" href="{{'inspection/create'}}"  class="btn btn-success btn-sm float-right">
                <i class="fa fa-plus"></i> <strong> NEW RECORD </strong>  
              </a>
            </div>
            @include('notification.alert')
            <table id="list" class="table table-bordered table-hover">
              <thead>
                <tr> 
                    <th>Vehicle</th>
                    <th>Customer</th>
                    <th>Remarks</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody>
                        @foreach($inspects as $inspect)
                            <tr>
                                <td>
                                    <li>Plate: {{$inspect->plate_number}}</li>
                                
                                    <li>Model: {{$inspect->brand}} - {{$inspect->model}} </li>
                        
                                </td>
                                <td>
                                    <li>Name: {{$inspect->firstname}} {{$inspect->middlename}} {{$inspect->lastname}}</li>
                                    <li>Address: {{$inspect->street}} {{$inspect->barangay}} {{$inspect->city}}</li>
                                    <li>Contact No.: {{$inspect->contact}}</li>
                                
                                    <li>Email: {{$inspect->email}}</li>
                                </td>
                                <td>Remark: {{$inspect->additional_remarks}}</td>
                                <td class="text-right">
                                    <a href="{{url('transaction/inspection'.$inspect->inspect_id.'/edit')}}" type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Update record">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a href="javascript: w=window.open('{{url('/inspection/pdf/'.$inspect->inspect_id)}}'); w.print()" target="_blank" type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Generate PDF">
                                        <i class="fa fa-file"></i>
                                    </a>
                             
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </table>
          </div>
        </div>
      </div>
    </section>
        
@endsection
