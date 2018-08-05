<!DOCTYPE html>
<html>
	<head>
		@include('admin.includes.head-content')
		@yield('page-specific-head-content')
	</head>
	<body>
		@include('admin.includes.navbar')
		@include('admin.includes.left-sidebar')
		@yield('content')
		@include('admin.includes.essential-js')
	</body>
</html>
