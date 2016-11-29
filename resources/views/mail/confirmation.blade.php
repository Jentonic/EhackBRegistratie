<html>
<head>
</head>
<body>
<div class="wrapper">
    <h1 class="cover-heading">{!! $title !!}</h1>
    <p class="lead">Bedankt voor uw deelname aan EhackB!</p>
    @if(!$user->options->isEmpty())
    <p>U heeft de volgende opties aangeduid:</p>
		<ul>
			@foreach ($user->options as $option)
				<li>{{ $option->name }}</li>
			@endforeach
		</ul>
    @endif
    @if(!$user->activities->isEmpty())
		<p>U heeft ook aangegeven deel te nemen aan volgende
			activiteiten:</p>
		<ul>
			@foreach ($user->activities as $activity)
				<li>{{ $activity->name }}</li>
			@endforeach
		</ul>
    @endif
    @if (!$user->team->isEmpty())
			<p>En u neemt deel aan de {{ $user->team[0]->game->name }} competitie met uw
				team "<i>{{ $user->team[0]->name }}</i>"</p>
		@endif
    <a href="{{url('confirmation',['token' => $token])}}">Confirmeer hier je email adres!</a></div>
</body>
</html>
