@extends('layouts.register')

@section('head')
  <title>Registreren en bij een publiek team gaan</title>
@stop

@section('content')

    <div class="alert alert-warning">
        <p><b>Opgelet!</b> Voor een team te maken moeten er minstens twee ehb en/of vub studenten geregistreerd staan in je team!</p>
    </div>
    @if(Session::has('err'))
    <div class="alert alert-danger">
        {{ Session::get('err') }}
    </div>
    @endif

  <br/>
    <form class="form-horizontal" method="POST" action="registerpublic" id="registerpublicform">
        {{ csrf_field() }}
        <h2>Registreren en bij een publiek team gaan</h2>
        <div class="line"></div>
        <div class="form-group row {{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="inputEmail" class="col-md-4 control-label">E-mail</label>
            <div class="col-md-4">
                <input type="text" name="email" class="form-control" id="inputEmail" placeholder="E-mail" value="{{ old('email') }}">
            </div>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row {{ $errors->has('reminderemail') ? ' has-error' : '' }}">
            <label for="inputReminderEmail" class="col-md-4 control-label">Reminder E-mail (Deze mail wordt gebruikt voor nieuwsbrieven en is optioneel)</label>
          <div class="col-md-4">
                <input type="text" name="reminderemail" class="form-control" id="inputReminderEmail" placeholder="Reminder E-mail" value="{{ old('reminderemail') }}">
            </div>
            @if ($errors->has('reminderemail'))
                <span class="help-block">
                    <strong>{{ $errors->first('reminderemail') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row {{ $errors->has('firstname') ? ' has-error' : '' }}">
            <label for="inputFirstName" class="col-md-4 control-label">Voornaam</label>
            <div class="col-md-4">
                <input type="text" name="firstname" class="form-control" id="inputFirstName" placeholder="Voornaam" value="{{ old('firstname') }}">
            </div>
            @if ($errors->has('firstname'))
                <span class="help-block">
                    <strong>{{ $errors->first('firstname') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row {{ $errors->has('lastname') ? ' has-error' : '' }}">
            <label for="inputLastName" class="col-md-4 control-label">Achternaam</label>
            <div class="col-md-4">
                <input type="text" name="lastname" class="form-control" id="inputLastName" placeholder="Achternaam" value="{{ old('lastname') }}">
            </div>
            @if ($errors->has('lastname'))
                <span class="help-block">
                    <strong>{{ $errors->first('lastname') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row {{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="inputPassword" class="col-md-4 control-label">Wachtwoord</label>
            <div class="col-md-4">
                <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Wachtwoord">
            </div>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row {{ $errors->has('verifypassword') ? ' has-error' : '' }}">
            <label for="inputVerifyPassword" class="col-md-4 control-label">Wachtwoordverificatie</label>
            <div class="col-md-4">
                <input type="password" name="verifypassword" class="form-control" id="inputVerifyPassword" placeholder="Herhaal je wachtwoord">
            </div>
            @if ($errors->has('verifypassword'))
                <span class="help-block">
                    <strong>{{ $errors->first('verifypassword') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row {{ $errors->has('game') ? ' has-error' : '' }}">
            <label for="inputGameID" class="col-md-4 control-label">Game</label>
            <div class="col-md-4">
                <select name="game" id="game" class="form-control">
                    @foreach($games as $game)
                        <option value='{{$game->id}}'>{{$game->name}}</option>
                    @endforeach
                </select>
            </div>
            @if ($errors->has('game'))
                <span class="help-block">
                    <strong>{{ $errors->first('game') }}</strong>
                </span>
            @endif
        </div>
        <!-- Public Team -->
        <div class="form-group row">
          <div class="col-md-4">
            <h3>Publieke teams</h3>
          </div>
          <div id="teamholder" class="col-md-4 antifixfix">
            @if(isset($teams))
              <p>@include('ajax.team', array('teams' => $teams))</p>
            @else
                Geen publieke teams beschikbaar voor deze game
            @endif
          </div>
        </div>

        <!-- Activities -->
        <div class="form-group row">
          <div class="col-md-4">
            <h3>Activiteiten</h3>
          </div>
          <div class="col-md-4">
            <h3 class="h3left">Keynotes</h3>
            @foreach($talks as $talk)
              <div class="checkbox">
                <label><input type="checkbox" name="activities[]"value="{{$talk->id}}">{{$talk->name}}
                  @if($talk->maxUsers != 9999) - Plaatsen: {{ $talk->maxUsers - $talk->users->count() }} @endif
                </label>
              </div>
            @endforeach

            <h3 class="h3left">Workshops</h3>
            @foreach($workshops as $workshop)
              <div class="checkbox">
                <label><input type="checkbox" name="activities[]"value="{{$workshop->id}}">{{$workshop->name}}
                  @if($workshop->maxUsers != 9999) - Plaatsen: {{ $workshop->maxUsers - $workshop->users->count() }} @endif
                </label>
              </div>
            @endforeach
          </div>
        </div>

        <!-- Options -->
        <div class="form-group row">
          <div class="col-md-4">
            <h3 class="h3antifix">Extra Opties</h3>
          </div>
          <div class="col-md-4">
            @foreach($options as $option)
              <div class="checkbox">
                <label><input type="checkbox" name="options[]"value="{{$option->id}}">{{$option->name}} - Prijs: €{{ number_format($option->price,2) }}</label>
              </div>
            @endforeach
          </div>
        </div>

        <button id="submitbutton" name="submitbutton" type="button" class="btn btn-primary">Submit</button>
    </form>
@stop

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/storePublic.js') }}"></script>
@stop

{{--
'email' => 'required|email|unique:users',
'firstname' => 'required',
'lastname' => 'required',
'password' => 'required',
'teamid' => 'team',
--}}
