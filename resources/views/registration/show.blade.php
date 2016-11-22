@extends('layouts.master')

@section('content')
  <h1>Jouw info</h1>
  <li>{{ $user->id }}</li>
  <li>{{ $user->firstName }}</li>
  <li>{{ $user->lastName }}</li>
  <li>{{ $user->email }}</li>
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
@stop

@section('scripts')

@stop