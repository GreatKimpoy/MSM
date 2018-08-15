<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ ( isset($title) ? "$title - " : "" ) . config('app.name') }}</title>

<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('material/plugins/font-awesome/css/font-awesome.min.css') }}" />
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('material/dist/css/adminlte.min.css') }}" />
<!-- iCheck -->
<link rel="stylesheet" href="{{ asset('material/plugins/iCheck/flat/blue.css') }}" />
<!-- Morris chart -->
<link rel="stylesheet" href="{{ asset('material/plugins/morris/morris.css') }}" />
<!-- jvectormap -->
<link rel="stylesheet" href="{{ asset('material/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}" />
<!-- Date Picker -->
<link rel="stylesheet" href="{{ asset('material/plugins/datepicker/datepicker3.css') }}" />
<!-- Daterange picker -->
<link rel="stylesheet" href="{{ asset('material/plugins/daterangepicker/daterangepicker-bs3.css') }}" />
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="{{ asset('material/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" />
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('material/plugins/select2/select2.min.css')}}" />
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="{{ asset('material/plugins/iCheck/all.css') }}" />
<link rel="stylesheet" href="{{ asset('material/plugins/colorpicker/bootstrap-colorpicker.min.css') }}" />
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('material/plugins/datatables/dataTables.bootstrap4.css') }}" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

<!---SELECT-->
<link rel="stylesheet" href="{{ asset('material/plugins/bootstrap-select/css/bootstrap-select.css') }}" />

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>