<html>
<head>
</head>
<body>
<div class="wrapper">
    <h1 class="cover-heading">{!! $title !!}</h1>
    <p class="lead">{!! $content !!}</p>
    <a href="{{url('invite', ['token'=>$token])}}">Join {{$team}}</a></div>
</body>
</html>
