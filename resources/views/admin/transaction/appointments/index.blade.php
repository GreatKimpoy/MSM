@extends('admin.layouts.app')

@section('content-header')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
      <h1 class="float-left">Service Appointments </h1>
      <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active">Service Appointments</li>
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
        <table id="appointmentsTable" class="table table-bordered table-hover">
          <thead>
            <tr> 
                <th>ID</th>
                <th>Customer ID</th>
                <th>Appointment Name</th>
                <th>Start Date</th>
                <th>End Date</th>
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
		var table = $('#appointmentsTable').DataTable( {
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
      ajax: "{{ url('appointments') }}",
      columns: [
          { data: "id" },
          { data: "customerID" },
          { data: "appointment_name" },
          { data: "appointment_startDate" },
          { data: "appointment_endDate" },
          { data: function(callback){
            return `
              <button type="button" data-id='` + callback.id + `"' class="btn-proceed btn btn-success"><i class= "fa fa-arrow-circle-right"></i><strong>Proceed</strong></button>
              <button type="button" data-id='` + callback.id + `"' class="btn-remove btn btn-danger"><i class= "fa fa-ban"></i><strong>Remove</strong></button>
            `
          } },
      ],
    } );

	 	$("div.toolbar").html(`
      </a>
 			<a type="button" id="new" href="{{ url('appointments/create') }}"  class="btn btn-primary btn-sm float-right">
              <i class="fa fa-plus"></i> <strong> CREATE APPOINTMENT</strong>  
      </a>
		`);

    $('#appointmentsTable').on('click', '.btn-remove', function(){
				id = $(this).data('id');
        var $this = $(this);
        var loadingText = '<i class="fa fa-circle-o-notch fa-spin"></i> Loading...';
        if ($(this).html() !== loadingText) {
          $this.data('original-text', $(this).html());
          $this.html(loadingText);
        }

        swal({
          title: "Are you sure?",
          text: "This appointment will be removed from database?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            $.ajax({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              type: 'delete',
              url: '{{ url("appointments/") }}' + "/" + id,
              data: {
                'id': id
              },
              dataType: 'json',
              success: function(response){
                swal('Operation Successful','Room removed from database','success')
              },
              error: function(){
                swal('Operation Unsuccessful','Error occurred while deleting a record','error')
              },
              complete: function(){
                $this.html($this.data('original-text'));
                table.ajax.reload();
              }
            });
          } else {
            $this.html($this.data('original-text'));
            swal("Cancelled", "Operation Cancelled", "error");
          }
        });
	    });

  });
</script>


@endsection