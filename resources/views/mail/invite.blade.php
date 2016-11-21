<html>
<head>
    <link href="{{ asset('bower/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
<div class="wrapper">
    <h1 class="cover-heading">{!! $title !!}</h1>
    <p class="lead">{!! $content !!}</p>
    <a href="">Join {{$team}}</a></div>
    {{--{{action('ReqistrationController@createMailInvite', ['token'=>$token])}}--}}
</body>
</html>