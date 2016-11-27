<!DOCTYPE html>
<html>
<head>
	<title>EhackB</title>
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

	{{-- include bootstrap, jquery --}}
	<link href="{{ asset('bower/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/index.css') }}" rel="stylesheet">
	@yield('style')
</head>
<body class="container">

<nav class="navbar navbar-fixed-top navbar-dark bg-inverse">
	{{--casual, team maken en public team joinen--}}
	<ul class="nav navbar-nav">
		<li class="nav-item ">
			<a class="nav-link" href="{{url('registercasual')}}">Register as a casual</a>
		</li>
		<li class="nav-item }">
			<a class="nav-link" href="{{url('register')}}">Make a team</a>
		</li>
		<li class="nav-item }">
			<a class="nav-link" href="{{url('registerteam')}}">Join a public team</a>
		</li>
	</ul>
</nav>
<div style="margin-top:50px" class="container col-xs-12 col-md-9 pull-md-3 bd-content">

	<div class="row">
		@yield('content')
	</div>

</div>
<script type="text/javascript" src="{{ asset('bower/jquery/dist/jquery.min.js') }}"></script>
@yield('scripts')
</body>
</html>
