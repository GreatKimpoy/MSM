@extends('admin.layouts.app')

@section('content-header')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
          <h1 class="float-left">Vehicle Categories</h1>
          <ol class="breadcrumb float-right">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Vehicle</li>
            <li class="breadcrumb-item active">Categories</li>
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
            <table id="vehicle-category-table" class="table table-bordered table-hover">
              <thead>
                <tr> 
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Year Made</th>
                    <th>Size</th>
                    <th>Transmission Type</th>
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
    var table = $('#vehicle-category-table').DataTable( {
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
      ajax: "{{ url('vehicle/category') }}",
      columns: [
          { data: "brand" },
          { data: "model" },
          { data: "year_made" },
          { data: "size" },
          { data: "transmission_type" },
          { data: function(callback){
            return `
              <a href="{{ url("vehicle/category") }}` + '/' + callback.id + `/edit" class="btn btn-warning"><i class="fa fa-edit"></i><strong>Edit</strong></a>
              <button type="button" data-id='` + callback.id + `"' class="btn-remove btn btn-danger"><i class= "fa fa-ban"></i><strong>Remove</strong></button>
            `
          } },
      ],
    } );

    $("div.toolbar").html(`
      <a type="button" id="new" href="{{ url('vehicle/category/create') }}"  class="btn btn-primary btn-sm">
        <i class="fa fa-plus"></i> <strong> Create </strong>  
      </a>
    `);

    $('#vehicle-category-table').on('click', '.btn-remove', function(){
        id = $(this).data('id');
        var $this = $(this);
        var loadingText = '<i class="fa fa-circle-o-notch fa-spin"></i> Loading...';
        if ($(this).html() !== loadingText) {
          $this.data('original-text', $(this).html());
          $this.html(loadingText);
        }

        swal({
          title: "Are you sure?",
          text: "This vehicle category will be removed?",
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
              url: '{{ url("vehicle/category") }}' + "/" + id,
              data: {
                'id': id
              },
              dataType: 'json',
              success: function(response){
                swal('Operation Successful','vehicle category removed','success')
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