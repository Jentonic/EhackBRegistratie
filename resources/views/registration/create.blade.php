@extends('layouts.master')

@section('content')
    <form method="POST" action="registerteam" id="registerteamform">
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
            <label for="teammembers" class="col-sm-2 col-form-label">Teammembers</label>
            <div class="col-sm-10" id="teammembers">
                <input type="text" class="form-control" placeholder="E-mail" name="teammembers[]">
                <input type="text" class="form-control" placeholder="E-mail" name="teammembers[]">
                <input type="text" class="form-control" placeholder="E-mail" name="teammembers[]">
                <input type="text" class="form-control" placeholder="E-mail" name="teammembers[]">
                <input type="text" class="form-control" placeholder="E-mail" name="teammembers[]">
            </div>
        </div>

        <button id="submit" type="button" onclick="submit(this.form)" class="btn btn-primary">Submit</button>

    </form>
@stop

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/storeTeam.js') }}"></script>
@stop

{{--
'email' => 'required|email|unique:users',
'firstname' => 'required',
'lastname' => 'required',
'password' => 'required',
'teamname' => 'required|required',
'teammembers' => 'required|array',
'teammembers.*' => 'distinct|email',
'gameid' => 'required|integer',
--}}