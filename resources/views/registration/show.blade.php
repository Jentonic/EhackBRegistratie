@extends('layouts.register')

@section('head')
  <title>Dashboard</title>
@stop

@section('content')
  <h2>Jouw info</h2>
  <div class="line"></div>
  <div class="col-md-6">
    <ul class="list-unstyled">
      <li class="list-group-item"><b>Voornaam: </b>{{ $user->firstName }}</li>
      <li class="list-group-item"><b>Achternaam: </b>{{ $user->lastName }}</li>
      <li class="list-group-item"><b>E-mailadres: </b>{{ $user->email }}</li>
      @if(!empty($user->reminderMail))
        <li class="list-group-item"><b>Reminder E-mailadres: </b>{{ $user->reminderMail }}</li>
      @endif
    </ul>
    @if(!$user->activities->isEmpty())
      <ul class="list-unstyled">
      <li class="list-group-item"><b>Activiteiten</b></li>
      @foreach($user->activities as $activity)
        <li class="list-group-item">{{ $activity->name }}</li>
      @endforeach
      </ul>
    @endif
    @if(!$user->options->isEmpty())
    <ul class="list-unstyled">
      <li class="list-group-item"><b>Extra opties</b></li>
      @foreach($user->options as $option)

        @if ($option->hasPrice)
          <li class="list-group-item">{{ $option->name . ": €" . number_format($option->price,2) }}</li>
        @else
          <li class="list-group-item">{{ $option->name . ": gratis" }}</li>
        @endif
      @endforeach
    </ul>
    @endif
  </div>
  <div class="col-md-6">
    @if(isset($user->team) && isset($user->team[0]->game))
      <ul class="list-unstyled">
      <li class="list-group-item"><b>{{ $user->team[0]->game->name . ": " . $user->team[0]->name }}</b></li>
      @if(isset($user->team[0]->users))
        <li class="list-group-item"><b>Leden</b></li>
        @foreach($user->team[0]->users as $member)
          <li class="list-group-item">{{ $member->firstName . " " . $member->lastName . " | " . $member->email }}</li>
        @endforeach
      @endif
      @if(isset($user->team[0]->invites))
        <li class="list-group-item"><b>Pending Invites</b></li>
        @foreach($user->team[0]->invites as $invite)
          <li class="list-group-item">{{ $invite->email }}</li>
        @endforeach
      @endif
      <ul>
    @endif
@stop
