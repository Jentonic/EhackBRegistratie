@extends('layouts.register')

@section('content')

  @if (count($errors) > 0)
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif


  @if(Session::has('err'))
    <div class="alert alert-danger">
      {{ Session::get('err') }}
    </div>
  @endif
    <form class="form-horizontal" method="POST" action="/registermail" id="registermailform">
      {{ csrf_field() }}
      <input type="hidden" name="token" value="{{$invite->token}}"/>
      <div class="form-group row">
        <label for="inputEmail" class="col-md-4 control-label">E-mail</label>
        <div class="col-md-4">
          <input type="text" name="email" class="form-control" id="inputEmail" placeholder="E-mail"
                 value="{{ $invite->email }}" readonly="readonly">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputReminderEmail" class="col-md-4 control-label">Reminder E-mail</label>
        <div class="col-md-4">
          <input type="text" name="reminderemail" class="form-control" id="inputReminderEmail" placeholder="Reminder E-mail">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputFirstName" class="col-md-4 control-label">First Name</label>
        <div class="col-md-4">
          <input type="text" name="firstname" class="form-control" id="inputFirstName" placeholder="First Name"
                 value="{{ old('firstname') }}">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputLastName" class="col-md-4 control-label">Last Name</label>
        <div class="col-md-4">
          <input type="text" name="lastname" class="form-control" id="inputLastName" placeholder="Last name"
                 value="{{ old('lastname') }}">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-md-4 control-label">Password</label>
        <div class="col-md-4">
          <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputVerifyPassword" class="col-md-4 control-label">Password verification</label>
        <div class="col-md-4">
          <input type="password" name="verifypassword" class="form-control" id="inputVerifyPassword"
                 placeholder="Repeat your password">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputGameID" class="col-md-4 control-label">Game</label>
        <div class="col-md-4">
          <select name="game" id="game" class="form-control">
            <option value='{{ $team->game->id }}'>{{$team->game->name}}</option>
          </select>
        </div>
      </div>

      <div class="col-md-4">
        <h3>Team</h3>
      </div>
      <div id="teamholder" class="form-group row">
        <p>You will join team: {{ $team->name }}</p>
      </div>

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

      <div class="col-md-4">
        <h3>Extra's</h3>
      </div>
      <div class="form-group row">
        @foreach($options as $option)
          <div class="checkbox col-md-6">
            <label><input type="checkbox" name="options[]"value="{{$option->id}}">{{$option->name}} - Price: €{{ number_format($option->price,2) }}</label>
          </div>
        @endforeach
      </div>

      <button id="submitbutton" name="submitbutton" type="button" class="btn btn-primary">Submit</button>
    </form>
@stop

@section('scripts')
  <script type="text/javascript" src="{{ asset('js/storeMail.js') }}"></script>
@stop

{{--
'email' => 'required|email|unique:users',
'firstname' => 'required',
'lastname' => 'required',
'password' => 'required',
'token' => 'required',
--}}
