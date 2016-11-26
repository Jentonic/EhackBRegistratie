@extends('layouts.master')

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
  <div class="col-md-10 col-md-offset-1">
    <form method="POST" action="storecasual" id="registercasualform">
        {{ csrf_field() }}

        <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">E-mail</label>
            <div class="col-sm-10">
                <input type="text" name="email" class="form-control" id="inputEmail" placeholder="E-mail" value="{{ old('email') }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputFirstName" class="col-sm-2 col-form-label">First Name</label>
            <div class="col-sm-10">
                <input type="text" name="firstname" class="form-control" id="inputFirstName" placeholder="First Name" value="{{ old('firstname') }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputLastName" class="col-sm-2 col-form-label">Last Name</label>
            <div class="col-sm-10">
                <input type="text" name="lastname" class="form-control" id="inputLastName" placeholder="Last name" value="{{ old('lastname') }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputVerifyPassword" class="col-sm-2 col-form-label">Password verification</label>
            <div class="col-sm-10">
                <input type="password" name="verifypassword" class="form-control" id="inputVerifyPassword" placeholder="Repeat your password">
            </div>
        </div>
        <!-- Activities -->
        <div class="col-sm-12">
          <h3>Activities</h3>
        </div>
        @foreach($activities as $activity)
          <div class="form-group row">
            <div class="checkbox col-sm-10 col-sm-offset-1">
              <label><input type="checkbox" name="activities[]"value="{{$activity->id}}">{{$activity->name}} - Places left: {{$activity->maxUsers - $activity->users->count()}}</label>
            </div>
          </div>
        @endforeach
        <!-- Options -->
        <div class="col-sm-12">
          <h3>Options</h3>
        </div>
        @foreach($options as $option)
          <div class="form-group row">
            <div class="checkbox col-sm-10 col-sm-offset-1">
              <label><input type="checkbox" name="options[]"value="{{$option->id}}">{{$option->name}} - Price: €{{ number_format($option->price,2) }}</label>
            </div>
          </div>
        @endforeach
        <button id="submitbutton" name="submitbutton" type="button" class="btn btn-primary">Submit</button>

    </form>
  </div>
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
