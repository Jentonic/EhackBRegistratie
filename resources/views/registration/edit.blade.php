@extends('layouts.register')

@section('content')
  <form action="#" method="post">
    {{ csrf_field() }}
    <input type="text" name="firstName" value="{{ $user->firstName }}" />
    <input type="text" name="lastName" value="{{ $user->lastName }}" />
    <input type="password" name="password" />
    <input type="password" name="passwordCheck" />
    <input type="submit" value="Wijzigingen toebrengen" />
  </form>
@stop

@section('scripts')

@stop