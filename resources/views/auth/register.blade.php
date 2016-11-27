@extends('layouts.register')

@section('head')
  <title>Registreren</title>
@stop

@section('content')
    <form method="POST" action="storeteam" id="registerteamform" class="group">
      {{ csrf_field() }}
      <h2>inschrijving</h2>
      <div class="line"></div>
      <div class="left">
        <div class="form-group row {{ $errors->has('email') ? ' has-error' : '' }}">
          <div class="col-sm-10">
            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="E-mail" required autofocus />
          </div>
        </div>
        @if ($errors->has('email'))
          <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
        @endif

        <div class="form-group row {{ $errors->has('firstname') ? ' has-error' : '' }}">
          <div class="col-sm-10">
            <input type="text" name="firstname" class="form-control" id="inputFirstName" placeholder="Voornaam" required />
          </div>
        </div>
        @if ($errors->has('firstname'))
          <span class="help-block">
            <strong>{{ $errors->first('firstname') }}</strong>
          </span>
        @endif

        <div class="form-group row {{ $errors->has('lastname') ? ' has-error' : '' }}">
          <div class="col-sm-10">
            <input type="text" name="lastname" class="form-control" id="inputLastName" placeholder="Achternaam" required />
          </div>
        </div>
        @if ($errors->has('lastname'))
          <span class="help-block">
            <strong>{{ $errors->first('lastname') }}</strong>
          </span>
        @endif

        <div class="form-group row">
          <div class="col-sm-10">
            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Wachtwoord" required />
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-10">
            <input type="password" name="password_confirmation" class="form-control" id="inputVerifyPassword" placeholder="Herhaal je wachtwoord" required>
          </div>
        </div>
        @if ($errors->has('password'))
          <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
          </span>
        @endif

        <div class="form-group row">
          <div class="col-sm-10">
            <select name="gameid" id="inputGameID" class="form-control">
              <option value="">Games</option>
            </select>
          </div>
        </div>
      </div>

      <div class="right">
        <div class="form-group row">
          <div class="col-sm-10">
            <input type="text" name="teamname" class="form-control" id="inputTeamName" placeholder="Teamnaam">
          </div>
        </div>

        <div class="form-group row">
          <div class="col-sm-10" id="teammembers">
            <input type="text" class="form-control" placeholder="E-mail" name="teammembers[]">
            <input type="text" class="form-control" placeholder="E-mail" name="teammembers[]">
            <input type="text" class="form-control" placeholder="E-mail" name="teammembers[]">
            <input type="text" class="form-control" placeholder="E-mail" name="teammembers[]">
            <input type="text" class="form-control" placeholder="E-mail" name="teammembers[]">
          </div>
        </div>
      </div>

      <input type="submit" name="submitbutton" id="submitbutton" class="btn btn-primary" />
    </form>
  </div>
@stop
