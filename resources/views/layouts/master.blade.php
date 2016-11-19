<!DOCTYPE html>
<html>
	<head>
		<title>EHACKB³ registratie</title>
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

		{{-- include bootstrap, jquery --}}
		<link href="{{ asset('bower/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
		<script type="javascript" href="{{asset('bower/jquery/dist/jquery.min.js')}}"></script>
	</head>
	<body>

		@yield('content')

		<script type="text/javascript" src="{{ asset('/js/jquery.min.js') }}"></script>
		@yield('scripts')
	</body>
</html>
