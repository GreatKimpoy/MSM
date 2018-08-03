@extends('admin.layouts.app')

@section('page-specific-head-content')
@endsection
@section('content')

<body class="hold-transition sidebar-mini">
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>VEHICLE MAINTENANCE</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
              <li class="breadcrumb-item active">VEHICLE MAINTENANCE</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>



    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="col-sm-3 pull-right">
                <a href="/admin/maintenance/vehicle/create-vehicle"type="button" class="btn btn-block btn-outline-success btn-sm"><i class="fa fa-plus" > VEHICLE</i></a>
              </div>
                <h3 class="card-title">VEHICLES TABLE</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
             <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr> 
                      <th>VEHICLE ID</th>
                      <th>VEHICLE BRAND</th>
                      <th>MODEL NAME</th>
                      <th>YEAR MODEL</th>
                      <th>ACTION</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($vehicles as $vehicle)
                    <tr>
                      <td>{{ $vehicle->VehicleId }}</td>
                      <td>{{ $vehicle->strBrand }}</td>
                      <td>{{ $vehicle->strModelName }}</td>
                      <td>{{ $vehicle->dtmYearMade }}</td>
                      <td><a href="/admin/maintenance/vehicle/vehicles/{{ $vehicle->VehicleId }}" class="btn btn-primary">View</a></td>
                    </tr>
                  @empty
                    <tr>
                      <td class="text text-warning">Empty</td>
                    </tr>
                  @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <th>VEHICLE ID</th>
                        <th>VEHICLE BRAND</th>
                        <th>MODEL NAME</th>
                        <th>YEAR MODEL</th>
                        <th>ACTION</th>
                    </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </section>

@section('page-specific-foot-content')

@endsection
@endsection

