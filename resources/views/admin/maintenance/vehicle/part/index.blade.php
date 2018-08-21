@extends('admin.layouts.app')

@section('content-header')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
      <h1 class="float-left">Vehicle Parts Maintenance</h1>
      <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item">Vehicle</li>
        <li class="breadcrumb-item active">Parts</li>
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
          <a type="button" id="new" href="{{ url('vehicle/part/create') }}"  class="btn btn-success btn-sm float-right">
            <i class="fa fa-plus"></i> <strong> NEW RECORD </strong>
          </a>
        </div>
        @include('notification.alert')
        <table id="partsTable" class="table table-bordered table-hover">
          <thead>
            <tr> 
                <th>Part Number</th>
                <th>Model</th>
                <th>Location</th>
                <th>Description</th>
                <th>Price</th>
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
		var table = $('#partsTable').DataTable( {
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
      ajax: "{{ url('vehicle/part') }}",
      columns: [
          { data: "number" },
          { data: "category.model" },
          { data: "location" },
          { data: "description" },
          { data: "price" },
          { data: function(callback){
            return `
              <a href="{{ url("vehicle/part") }}` + '/' + callback.id + `/edit" class="btn btn-warning"><i class="fa fa-edit"></i><strong>Edit</strong></a>
              <button type="button" data-id='` + callback.id + `"' class="btn-remove btn btn-danger"><i class= "fa fa-ban"></i><strong>Remove</strong></button>
            `
          } },
      ],
    } );

    $('#partsTable').on('click', '.btn-remove', function(){
				id = $(this).data('id');
        var $this = $(this);
        var loadingText = '<i class="fa fa-circle-o-notch fa-spin"></i> Loading...';
        if ($(this).html() !== loadingText) {
          $this.data('original-text', $(this).html());
          $this.html(loadingText);
        }

        swal({
          title: "Are you sure?",
          text: "This part number will be removed?",
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
              url: '{{ url("vehicle/part") }}' + "/" + id,
              data: {
                'id': id
              },
              dataType: 'json',
              success: function(response){
                swal('Operation Successful','part number removed','success')
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