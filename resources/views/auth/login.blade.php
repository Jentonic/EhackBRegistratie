@extends('layouts.register')

@section('head')
  <title>Inloggen</title>
@stop

@section('content')
  <div class="col-md-10 col-md-offset-1">
    <form class="group ehackbg form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
      {{ csrf_field() }}
      <center><img src="img/logo.png" alt="logo" id="logo"></center>
      <h2>login</h2>
      <div class="line"></div>

      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="col-md-4 control-label">E-Mail</label>
        <div class="col-md-6">
          <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
          @if ($errors->has('email'))
            <span class="help-block">
              <strong>{{ $errors->first('email') }}</strong>
            </span>
          @endif
        </div>
      </div>

      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" class="col-md-4 control-label">Wachtwoord</label>
        <div class="col-md-6">
          <input id="password" type="password" class="form-control" name="password" required>
          @if ($errors->has('password'))
            <span class="help-block">
              <strong>{{ $errors->first('password') }}</strong>
            </span>
          @endif
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
          <div class="checkbox">
            <label>
              <input type="checkbox" name="remember"> Mij onthouden
            </label>
          </div>
        </div>
      </div>

      <div class="form-group">
        <button type="submit" id="submitbutton" class="btn btn-primary">
          Login
        </button>

        <a class="btn btn-link center-block" href="{{ url('/password/reset') }}">
          Wachtwoord vergeten?
        </a>
      </div>
    </form>
  </div>
@stop
