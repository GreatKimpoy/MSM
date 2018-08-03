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
            <h1>MECHANIC MAINTENANCE</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
              <li class="breadcrumb-item active">MECHANIC MAINTENANCE</li>
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
                <a href="/admin/maintenance/mechanic/create-mechanic"type="button" class="btn btn-block btn-outline-success btn-sm"><i class="fa fa-plus" > TECHNICIAN</i></a>
              </div>
                <h3 class="card-title">TECHNICIAN TABLE</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
              <thead>
                  <tr>
  
                    <th>Mechanic ID</th>
                    <th>Mechanic Name</th>
                    <th>Specialization</th>
                    <th>Contact</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                  
                    <th>Mechanic ID</th>
                    <th>Mechanic Name</th>
                    <th>Specialization</th>
                    <th>Contact</th>
                    <th>ACTION</th>
                </tr>
            </tfoot>
            <tbody>
              @forelse($mechanics as $mechanic)
                <tr>
               
                  <td>{{ $mechanic->MechanicId }}</td>
                  <td>{{ $mechanic->strFirstName }} {{ $mechanic->strMiddleName }} {{ $mechanic->strLastName }}</td>
                  <td>{{ $mechanic->strCategoryName }}</td>
                  <td>{{ $mechanic->strContact }}</td>
                  <td><a href="/admin/maintenance/mechanic/{{ $mechanic->MechanicId }}" class="btn btn-primary">View</a></td>
                </tr>
              @empty
                <tr>
                  <td class="text text-warning">Empty</td>
                </tr>
              @endforelse
            </tbody>
                
              
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        
</body>


@section('page-specific-foot-content')

@endsection
@endsection