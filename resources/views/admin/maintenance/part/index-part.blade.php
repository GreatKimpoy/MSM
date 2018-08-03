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
            <h1>PARTS MAINTENANCE</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
              <li class="breadcrumb-item active">PARTS MAINTENANCE</li>
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
                <a href="#" type="button" class="btn btn-block btn-outline-success btn-sm"><i class="fa fa-plus" > PARTS</i></a>
              </div>
                <h3 class="card-title">PARTS TABLE</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
             <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr> 
                      
                      <th>PART NUMBER</th>
                      <th>MODEL NAME</th>
                      <th>PART LOCATION</th>
                      <th>PRICE</th>
                      <th>DESCRIPTION</th>
                      <th>ACTION</th>
                  </tr>
                </thead>   
                <tfoot>
                   <tr> 
                     
                      <th>PART NUMBER</th>
                      <th>MODEL NAME</th>
                      <th>PART LOCATION</th>
                      <th>DESCRIPTION</th>
                      <th>PRICE</th>
                      <th>ACTION</th>
                  </tr>
                </tfoot>
                <tbody>
                  @forelse($parts as $part)
                    <tr>
                      <td>{{ $part->strPartNo }}</td>
                      <td>{{ $part->strModelName}}</td>
                      <td>{{ $part->strPartLocation}}</td>
                      <td>{{ $part->strPartDescription }}</td>
                      <td>{{ $part->fltPartPrice }}</td>
                      <td><a href="/admin/maintenance/part/parts/{{ $part->PartId }}" class="btn btn-primary">View</a></td>
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
        </div>
      </div>
    </section>

@section('page-specific-foot-content')

@endsection
@endsection

