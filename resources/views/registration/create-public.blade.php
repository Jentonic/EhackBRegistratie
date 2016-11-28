@extends('layouts.register')

@section('content')


    @if(Session::has('err'))
    <div class="alert alert-danger">
        {{ Session::get('err') }}
    </div>
    @endif

  <br/>
    <form class="form-horizontal" method="POST" action="registerpublic" id="registerpublicform">
        {{ csrf_field() }}
        <h2>Registreren en join een public team</h2>
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
            <label for="inputFirstName" class="col-md-4 control-label">First Name</label>
            <div class="col-md-4">
                <input type="text" name="firstname" class="form-control" id="inputFirstName" placeholder="First Name" value="{{ old('firstname') }}">
            </div>
            @if ($errors->has('firstname'))
                <span class="help-block">
                    <strong>{{ $errors->first('firstname') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row {{ $errors->has('lastname') ? ' has-error' : '' }}">
            <label for="inputLastName" class="col-md-4 control-label">Last Name</label>
            <div class="col-md-4">
                <input type="text" name="lastname" class="form-control" id="inputLastName" placeholder="Last name" value="{{ old('lastname') }}">
            </div>
            @if ($errors->has('lastname'))
                <span class="help-block">
                    <strong>{{ $errors->first('lastname') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row {{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="inputPassword" class="col-md-4 control-label">Password</label>
            <div class="col-md-4">
                <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
            </div>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row {{ $errors->has('verifypassword') ? ' has-error' : '' }}">
            <label for="inputVerifyPassword" class="col-md-4 control-label">Password verification</label>
            <div class="col-md-4">
                <input type="password" name="verifypassword" class="form-control" id="inputVerifyPassword" placeholder="Repeat your password">
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
        <div class="col-md-4">
          <h3>Public teams</h3>
        </div>
        <div id="teamholder" class="form-group row">
          @if(isset($teams))
            @include('ajax.team', array('teams' => $teams))
          @else
            <div class="form-group row col-md-4">
              <p>No public teams for this game available</p>
            </div>
          @endif
        </div>

        <!-- Activities -->
        <div class="col-md-4">
            <h3>Activiteiten</h3>
        </div>
        <div class="form-group row">
            @foreach($activities as $activity)
                <div class="checkbox col-md-4">
                    <label><input type="checkbox" name="activities[]"value="{{$activity->id}}">{{$activity->name}} - Places left: {{$activity->maxUsers - $activity->users->count()}}</label>
                </div>
            @endforeach
        </div>

        <!-- Options -->
        <div class="col-md-4">
            <h3>Extra Opties</h3>
        </div>
        <div class="form-group row">
            @foreach($options as $option)
                <div class="checkbox col-md-4">
                    <label><input type="checkbox" name="options[]"value="{{$option->id}}">{{$option->name}} - Price: €{{ number_format($option->price,2) }}</label>
                </div>
            @endforeach
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
