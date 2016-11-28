@extends('layouts.register')

@section('content')

    @if(Session::has('err'))
    <div class="alert alert-danger">
        {{ Session::get('err') }}
    </div>
    @endif

  <br/>
    <form class="form-horizontal" method="POST" action="storecasual" id="registercasualform">
        {{ csrf_field() }}
        <h2>Registreren als casual</h2>
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


        <!-- Activities -->
        <div class="col-md-4">
          <h3>Activiteiten</h3>
        </div>
        <div class="form-group row">
        @foreach($activities as $activity)
          <div class="checkbox col-md-6">
            <label><input type="checkbox" name="activities[]"value="{{$activity->id}}">{{$activity->name}}
              @if($activity->maxUsers != 9999) - Places left: {{ $activity->maxUsers - $activity->users->count() }} @endif
            </label>
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
    <script type="text/javascript" src="{{ asset('js/storeCasual.js') }}"></script>
@stop

{{--
'email' => 'required|email|unique:users',
'firstname' => 'required',
'lastname' => 'required',
'password' => 'required',
--}}
