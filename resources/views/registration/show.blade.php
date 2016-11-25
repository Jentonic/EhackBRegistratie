@extends('layouts.register')

@section('head')
  <title>Dashboard</title>
@stop

@section('content')
  <h2>Jouw info</h2>
  <div class="line"></div>
  <div class="left">
    <ul class="list-unstyled">
      <li class="list-group-item"><b>Voornaam: </b>{{ $user->firstName }}</li>
      <li class="list-group-item"><b>Achternaam: </b>{{ $user->lastName }}</li>
      <li class="list-group-item"><b>E-mailadres: </b>{{ $user->email }}</li>
    </ul>
  </div>

  <div class="right">
    @if(isset($team) && isset($game))
      <br />
      <h1>{{ $game->name . ": " . $team->name }}</h1>
      @if(isset($members))
        <h2>Leden</h2>
        @foreach($members as $member)
          <li>{{ $member->firstName . " " . $member.lastName . " | " . $member.email }}</li>
        @endforeach
      @endif
    @endif

    @if(empty($activities))
      <br />
      <h1>Activiteiten</h1>
      @foreach($activities as $activity)
        <li>{{ $activity->name . ": " . $activity->description . " | " . $activity->group()->get()->first()->name }}</li>
      @endforeach
    @endif

    @if(empty($options))
      <br />
      <h1>Extra opties</h1>
      @foreach($options as $option)
        @if ($option->hasPrice)
          <li>{{ $option->name . ": €" . $options->price }}</li>
        @else
          <li>{{ $option->name . ": gratis" }}</li>
        @endif
      @endforeach
    @endif
  </div>
@stop