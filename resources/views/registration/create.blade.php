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

    <form class="form-horizontal" method="POST" action="storeteam" id="registerteamform">
        {{ csrf_field() }}
        @foreach(App\Game::all() as $game)
            <input type="hidden" id="game{{$game->id}}players" value="{{$game->maxPlayers}}">
        @endforeach

        <h2>inschrijven als team</h2>
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
<<<<<<< HEAD
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
                        @foreach(App\Game::all() as $game)
                            <option value={{$game->id}}>{{$game->name}}</option>
                        @endforeach
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

<<<<<<< HEAD
=======
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

>>>>>>> e666d8670d23ac34591d12ef17db0191f1c6879b
        <button id="submitbutton" name="submitbutton" type="button" class="btn btn-primary">Submit</button>
    </form>
@stop

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/storeTeam.js') }}"></script>
@stop