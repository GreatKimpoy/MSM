<!-- jQuery -->
<script src="{{ asset('material/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('material/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{ asset('material/plugins/morris/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('material/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('material/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('material/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('material/plugins/knob/jquery.knob.js') }}"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="{{ asset('material/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('material/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('material/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('material/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('material/plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('material/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="{{ asset('material/dist/js/pages/dashboard.js') }}"></script> -->
<!-- AdminLTE for demo purposes -->
<!-- <script src="{{ asset('material/dist/js/demo.js') }}"></script> -->


<script src="{{ asset('material/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{ asset('material/plugins/datatables/dataTables.bootstrap4.js')}}"></script>
<script src="{{ asset('material/plugins/select2/select2.full.min.js')}}"></script>

<!-- InputMask -->
<script src="{{ asset('material/plugins/input-mask/jquery.inputmask.js')}}"></script>
<script src="{{ asset('material/plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
<script src="{{ asset('material/plugins/input-mask/jquery.inputmask.extensions.js')}} "></script>

<script src="{{ asset('material/panel/panel/js/lobipanel.min.js')}}"></script>

<script>
  $(function(){
  $('.panel').lobiPanel();
});

</script>


<!---FullCalendar-->
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>


<script>
  
    $('#calendar').fullCalendar({
    eventLimit: true, // for all non-agenda views
    views: {
      agenda: {
        eventLimit: 6 // adjust to 6 only for agendaWeek/agendaDay
      }
    }
  });
    
</script>


<!-- fullCalendar 2.2.5 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="{{ asset('material/plugins/fullcalendar/fullcalendar.min.js')}}"></script>



<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

<script>
  $(function () {

    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()
    $('#calendars').fullCalendar({
        header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week : 'week',
        day  : 'day'
      },
      })

    
  })
</script>


  <script>
     $('.select2').select2();

             //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
        //Money Euro
        $('[data-mask]').inputmask()

        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false
    });

        
  </script>

<script>


$("#viewTable").click(function () {
    $("#tabularTab").show();
    $("#calendarTab").hide();
});

$("#viewCalendar").click(function () {
    $("#tabularTab").hide();
    $("#calendarTab").show();
});

$('#list').DataTable({

});

$('#job').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false

    });

</script> 


<script src="{{ URL::asset('material/formbuilder/form-builder.min.js') }}"></script>
<script src="{{ URL::asset('material/formbuilder/form-render.min.js') }}"></script>
<script src="{{ URL::asset('js/inspection.js') }}"></script>
<script src="{{ URL::asset('js/customer.js') }}"></script>
<script src="{{ URL::asset('js/techList.js') }}"></script>
<script src="{{ URL::asset('js/inspect.js') }}"></script>


