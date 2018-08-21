@extends('admin.layouts.app')

@section('content-header')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
      <h1 class="float-left">Inspection</h1>
      <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ url('inspection') }}">Inspection</a></li>
        <li class="breadcrumb-item active">Create</li>
      </ol>
  </div><!-- /.container-fluid -->
</section>
@endsection

@section('content-body')
<section class="content-header">
  <div class="container-fluid">
    <div class="card col-sm-12 mt-3">
      <div class="card-block pt-3">
        <div class="card-header bg-danger">
          <strong>Inspection Details</strong>
        </div>
        <div class="card-body">
          <form method="post" action="{{ url('inspection') }}" class="form-horizontal">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              @include('errors.alert')
              @include('admin.maintenance.customer.form')
              @include('admin.transaction.inspection.form')
              <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block">Save</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('scripts-include')


<link rel="stylesheet" href="{{ asset('material/panel/bootstrap/dist/css/bootstrap.min.css')}}"/>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


@if(old('item_id'))
        @foreach(old('item_id') as $key=>$item)
            <script>
                form = JSON.stringify({!! old('form.'.$key) !!});
                popForm({{old('type_id.'.$key)}},"{{old('typeName.'.$key)}}",{{old('item_id.'.$key)}},"{{old('itemName.'.$key)}}",form)
            </script>
        @endforeach
    @else
        @foreach($items as $item)
            <script>
                form = JSON.stringify({!! $item->form !!});
                popForm({{$item->type_id}},"{{$item->type->type}}",{{$item->id}},"{{$item->name}}",form)
            </script>
        @endforeach
@endif

@endsection