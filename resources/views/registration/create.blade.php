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

    <form method="POST" action="test" id="registerteamform">
        {{ csrf_field() }}

        <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">E-mail</label>
            <div class="col-sm-10">
                <input type="text" name="email" class="form-control" id="inputEmail" placeholder="E-mail">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputFirstName" class="col-sm-2 col-form-label">First Name</label>
            <div class="col-sm-10">
                <input type="text" name="firstname" class="form-control" id="inputFirstName" placeholder="First Name">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputLastName" class="col-sm-2 col-form-label">Last Name</label>
            <div class="col-sm-10">
                <input type="text" name="lastname" class="form-control" id="inputLastName" placeholder="Last name">
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

        {{-- Activities --}}
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

        {{-- options --}}
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

        <div class="form-group row">
            <label for="inputGameID" class="col-sm-2 col-form-label">Game</label>
            <div class="col-sm-10">
                <select name="gameid" id="inputGameID" class="form-control">
                    @foreach(App\Game::all() as $game)
                        <option value={{$game->id}}>{{$game->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        @foreach(App\Game::all() as $game)
            <input type="hidden" id="game{{$game->id}}players" value="{{$game->maxPlayers}}">
        @endforeach

        <div class="form-group row">
            <label for="inputTeamName" class="col-sm-2 col-form-label">Team Name</label>
            <div class="col-sm-10">
                <input type="text" name="teamname" class="form-control" id="inputTeamName" placeholder="Team Name">
            </div>
        </div>


        <div class="form-group row">
            <label for="teammembers" class="col-sm-2 col-form-label">Teammembers</label>
            <div class="col-sm-10" id="teammembers">
                <input type="text" class="form-control" placeholder="E-mail" name="teammembers[]">
                <input type="text" class="form-control" placeholder="E-mail" name="teammembers[]">
                <input type="text" class="form-control" placeholder="E-mail" name="teammembers[]">
                <input type="text" class="form-control" placeholder="E-mail" name="teammembers[]">
                <input type="text" class="form-control" placeholder="E-mail" name="teammembers[]">
            </div>
        </div>

        <button id="submitbutton" name="submitbutton" type="button" class="btn btn-primary">Submit</button>

    </form>
@stop

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/storeTeam.js') }}"></script>
@stop