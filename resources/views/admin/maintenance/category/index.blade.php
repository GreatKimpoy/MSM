@extends('admin.layouts.app')

@section('content')
<body class="hold-transition sidebar-mini">
<!-- Content Wrapper. Contains page content -->
<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
                <h1 class="modal-title align-center" id="defaultModalLabel"></h1>
            </div>
      
            <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">ADD SERVICE CATEGORY</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
        
        
        <!-- Modal body -->
        <div class="modal-body">
         <div class="row clearfix">
                    <div class="col-lg-24 col-md-24 col-sm-12 col-xs-12">
                      
                            
                                <div class = "row">
                                   {!! Form::open([ 'method' => 'POST', 'url' => url('category') ]) !!}
                                    <div class = "col-sm-12">
                                        <div class="form">
                                            {!! Form::label('Category Name', 'Category Name') !!}<span>*</span>
                                          {{Form::text('strCategoryName', '',
                                             ['class' => 'form-control align-center', 
                                             'placeholder' => 'CATEGORY NAME',
                                             'maxlength' =>'50',
                                             'required'])
                                            }}
                                          
                                        </div>
                                        <div class = "form">
                                          {!! Form::label('Category Description', 'Category Description') !!}<span>*</span>
                                          {{Form::textarea('strDescription', '',
                                              ['class' => 'form-control align-center',
                                              'placeholder' => 'Description',
                                              'maxlength' => '100',
                                              'required'])
                                            }}
                                        </div>
                                    </div>
                                </div>
                                
                          
                         
                        </div>
                      </div>

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
          {!! Form::close() !!}
        </div>
        
      </div>
    </div>
  </div>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>SERVICE CATEGORY MAINTENANCE</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
              <li class="breadcrumb-item active">SERVICE CATEGORY MAINTENANCE</li>
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
                <a data-toggle="modal" data-target="#myModal" type="button" class="btn btn-block btn-outline-success btn-sm"><i class="fa fa-plus" > CATEGORIES</i></a>
              </div>
                <h3 class="card-title">SERVICE CATEGORY TABLE</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr> 
                    
                    <th>CATEGORY NAME</th>
                    <th>CATEGORY DESCRIPTION</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tfoot>
                 <tr> 
                    
                    <th>CATEGORY NAME</th>
                    <th>CATEGORY DESCRIPTION</th>
                    <th>ACTION</th>
                </tr>
            </tfoot>
            <tbody>
              @forelse($categories as $service_cat)
                <tr>
                 
                  <td>{{ $service_cat->strCategoryName }}</td>
                  <td>{{ $service_cat->strDescription }}</td>
                  <td><a href="/admin/maintenance/category/categories/{{ $service_cat->CategoryId }}" class="btn btn-primary">View</a></td>
                </tr>
              @empty
                <tr>
                  <td class="text text-warning">Empty</td>
                </tr>
              @endforelse
                
              
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </body>

@endsection

