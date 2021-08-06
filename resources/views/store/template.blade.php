<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> @yield('title', 'Servi-partes hidráulicas')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.1/lumen/bootstrap.min.css" rel="stylesheet" integrity="sha384-87sz15XXg/vK1YUT8aQFH3EIw5aC/jbpolvTC264SVJfjOIBWv0V/o2FyyKclY8G" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link href='http://fonts.googleapis.com/css?family=Poiret+One|Lobster+Two' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>
	
	@if(\Session::has('message'))
		@include('store.partials.message')
	@endif

	@include('store.partials.nav')
	

	@yield('content')


	@include('store.partials.footer')

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	<script src="{{ asset('js/pinterest_grid.js') }}"></script>
	<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>