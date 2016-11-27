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

  <br/>
    <form class="form-horizontal" method="POST" action="storecasual" id="registercasualform">
        {{ csrf_field() }}
        <h2>Registreren als casual</h2>
        <div class="line"></div>

        <div class="form-group row">
            <label for="inputEmail" class="col-md-4 control-label">E-mail</label>
          <div class="col-md-4">
                <input type="text" name="email" class="form-control" id="inputEmail" placeholder="E-mail" value="{{ old('email') }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputReminderEmail" class="col-md-4 control-label">Reminder E-mail (Deze mail wordt gebruikt voor nieuwsbrieven en is optioneel)</label>
          <div class="col-md-4">
                <input type="text" name="reminderemail" class="form-control" id="inputReminderEmail" placeholder="Reminder E-mail" value="{{ old('reminderemail') }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputFirstName" class="col-md-4 control-label">First Name</label>
          <div class="col-md-4">
                <input type="text" name="firstname" class="form-control" id="inputFirstName" placeholder="First Name" value="{{ old('firstname') }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputLastName" class="col-md-4 control-label">Last Name</label>
          <div class="col-md-4">
                <input type="text" name="lastname" class="form-control" id="inputLastName" placeholder="Last name" value="{{ old('lastname') }}">
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
                <input type="password" name="verifypassword" class="form-control" id="inputVerifyPassword" placeholder="Repeat your password">
            </div>
        </div>
        <!-- Activities -->
        <div class="col-md-4">
          <h3>Activiteiten</h3>
        </div>
        @foreach($activities as $activity)
          <div class="form-group row">
            <div class="checkbox col-md-4">
              <label><input type="checkbox" name="activities[]"value="{{$activity->id}}">{{$activity->name}} - Places left: {{$activity->maxUsers - $activity->users->count()}}</label>
            </div>
          </div>
        @endforeach
        <!-- Options -->
        <div class="col-md-4">
          <h3>Extra Opties</h3>
        </div>
        @foreach($options as $option)
          <div class="form-group row">
            <div class="checkbox col-md-4">
              <label><input type="checkbox" name="options[]"value="{{$option->id}}">{{$option->name}} - Price: €{{ number_format($option->price,2) }}</label>
            </div>
          </div>
        @endforeach
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
