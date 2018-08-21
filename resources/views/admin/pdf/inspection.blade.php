<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>

 	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('material/panel/bootstrap/dist/css/bootstrap.min.css')}}"/>
    <!-- responsive dataformbuilder-->
    <link rel="stylesheet" type="text/css" href="{{asset('material/formbuilder/form-builder.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('material/formbuilder/form-render.min.css') }}">



    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<title>MIDSOUTH || INSPECTION FORM</title>

</head>
<body id="hi">

<center>
        <h2>MIDSOUTH</h2>
        <h4>BASIC INSPECTION FORM</h4>
</center>


<div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <center><h2 class="panel-title">Customer Details</h2></center>
                    </div>
                    <div class="panel-body">
                        <div class="row" style="width:100%">
                            <div class="col-md-6" style="float:left;width:50%">
                               Customer: {{$inspect->customer->firstname}} {{$inspect->customer->middlename}} {{$inspect->customer->lastname}}<br>
                                Address: {{$inspect->customer->street}} {{$inspect->customer->brgy}} {{$inspect->customer->city}}<br>
                                Phone Number: {{$inspect->customer->contact}}<br>
                                Email: {{$inspect->customer->email}}<br>
                                <br>
                                <br>
                            </div>
                            <div class="col-md-6" style="float:right:width:50%">

                                Plate: {{$inspect->plate_number}}<br>
                                Make: {{$inspect->brand}}<br>
                                Model: {{$inspect->name}}<br>
              
                            </div>
                        </div>
                    </div>
                </div>
                <div id="form-box"></div>
            </div>            
        </div>
    </div>


    	<!-- jQuery -->
	<script src="{{ asset('material/plugins/jquery/jquery.min.js')}}"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script src="{{ asset('material/jspdf/jspdf.js') }}"></script>
    <script src="{{ asset('material/jspdf/from_html.js') }}"></script>
    <script src="{{ asset('material/jspdf/split_text_to_size.js') }}"></script>
    <script src="{{ asset('material/jspdf/standard_fonts_metrics.js') }}"></script>

    <script src="{{ asset('material/formbuilder/form-builder.min.js') }}"></script>
    <script src="{{ asset('material/formbuilder/form-render.min.js') }}"></script>
	<script src="{{ asset('js/inspect.js') }}"></script>

	@foreach($inspect->inspection as $inspection)
        <script>
            form = JSON.stringify({!! $inspection->additional_remarks!!});
            pdfForm({{$inspection->item->type_id}},"{{$inspection->item->type->type}}",{{$inspection->item_id}},"{{$inspection->item->name}}",form)
        </script>
    @endforeach

</body>
</html>