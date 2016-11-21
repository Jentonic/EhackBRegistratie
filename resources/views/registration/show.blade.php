@extends('layouts.master')

@section('content')
  <li>{{ $user->id }}</li>
  <li>{{ $user->firstName }}</li>
  <li>{{ $user->lastName }}</li>
  <li>{{ $user->email }}</li>
  @if(isset($team))
    {{ 'kben een mongool' }}
    <li>{{ $team->name }}</li>
  @endif
@stop

@section('scripts')

@stop