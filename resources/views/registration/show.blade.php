@extends('layouts.master')

@section('content')
  <li>{{ $user->id }}</li>
  <li>{{ $user->firstName }}</li>
  <li>{{ $user->lastName }}</li>
  <li>{{ $user->email }}</li>

  @if(isset($team))
    <li>{{ $team->name }}</li>
  @endif

  @if(!isEmpty($activities))
    @foreach($activities as $activity)
      <li>{{ $activity->name . ": " . $activity->description . " | " . $activity->group()->get()->first()->name }}</li>
    @endforeach
  @endif
@stop

@section('scripts')

@stop