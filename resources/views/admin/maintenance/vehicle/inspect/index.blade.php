@extends('admin.layouts.app')



@section('content-header')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
          <h1 class="float-left">Vehicle Inspection</h1>
          <ol class="breadcrumb float-right">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Vehicle</li>
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
              <a type="button" id="new" href="{{ url('vehicle/inspect/create') }}"  class="btn btn-success btn-sm float-right">
                <i class="fa fa-plus"></i> <strong> NEW RECORD </strong>  
              </a>
            </div>
            @include('notification.alert')
            <table id="list" class="table table-bordered table-hover">
              <thead>
                <tr> 
                    <th>Inspection</th>
                    <th>Item(s)</th>
                    <th >Actions</th>
                </tr>
              </thead>

              <tbody>
                @foreach($inspections as $inspection)
                                    <tr>
                                        <td>{{$inspection->type}}</td>
                                        <td>
                                            @foreach($inspection->item as $item)
                                                <li>{{$item->name}}</li>
                                            @endforeach
                                        </td>
                                        <td class="text-right">
                                            <a href="{{url('vehicle/inspect/'.$inspection->id.'/edit')}}" type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Update record">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button onclick="deactivateShow({{$inspection->id}})" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Deactivate record">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
              </tbody>


            </table>
          </div>
        </div>
      </div>
    </section>

@endsection

@section('scripts-include')
<script type="text/javascript">
  $(document).ready(function() {


    $('#list').on('click', '.btn-remove', function(){
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
              url: '{{ url("vehicle/inspect") }}' + "/" + id,
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