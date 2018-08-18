@extends('admin.layouts.app')

@section('content-header')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
      <h1 class="float-left">Job Orders</h1>
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
        @include('notification.alert')
        <table id="job-orders-table" class="table table-bordered table-hover">
          <thead>
            <tr> 
                <th>ID</th>
                <th>Customer</th>
                <th>Vehicle</th>
                <th>Remarks</th>
                <th>Status</th>
                <th></th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</section>
@endsection

@section('scripts-include')
<script type="text/javascript">
	$(document).ready(function() {
		var table = $('#job-orders-table').DataTable( {
	  		select: {
	  			style: 'single'
	  		},
		    language: {
		        searchPlaceholder: "Search..."
		    },
	    	columnDefs:[
				{ targets: 'no-sort', orderable: false },
	    	],
	    	"dom": "<'row'<'col-sm-3'l><'col-sm-6'<'toolbar'>><'col-sm-3'f>>" +
						    "<'row'<'col-sm-12'tr>>" +
						    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
			"processing": true,
      serverSide: true,
      ajax: "{{ url('job-order') }}",
      columns: [
          { data: "id" },
          { data: "customer_name" },
          { data: "vehicle_name" },
          { data: "remarks" },
          { data: "status" },
          { data: function(callback){
            return `
              <a href="{{ url("job-order") }}` + '/' + callback.id + `" class="btn btn-light">
                <i class="fas fa-folder"></i>  View
              </a>
            `
          } },
      ],
    } );

	 	$("div.toolbar").html(`
 			<a type="button" id="new" href="{{ url('job-order/option') }}"  class="btn btn-primary btn-sm float-right">
            <i class="fa fa-plus"></i> <strong> START TRANSACTION</strong>  
      </a>
		`);

  });
</script>
@endsection