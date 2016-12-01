@extends('layouts.register')

@section('head')
    <title>Inschrijven als team</title>
@stop

@section('content')
    <div class="alert alert-warning">
        <p><b>Opgelet!</b> Voor een team te maken moeten er minstens twee ehb en/of vub studenten geregistreerd staan in je team!</p>
    </div>
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

    <form class="form-horizontal" method="POST" action="storeteam" id="registerteamform">
        {{ csrf_field() }}
        @foreach(App\Game::all() as $game)
            <input type="hidden" id="game{{$game->id}}players" value="{{$game->maxPlayers}}">
        @endforeach

        <h2>inschrijven als team</h2>
        <div class="line"></div>

        {{-- email --}}
        <div class="form-group row {{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="inputEmail" class="col-md-4 control-label">E-mail</label>
            <div class="col-md-4">
                <input type="email" name="email" class="form-control" id="inputEmail" placeholder="E-mail" required autofocus value="{{old('email')}}"/>
            </div>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        {{-- reminder email --}}
        <div class="form-group row {{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="inputReminderEmail" class="col-md-4 control-label">Reminder E-mail (Deze mail wordt gebruikt voor nieuwsbrieven en is optioneel)</label>
            <div class="col-md-4">
                <input type="text" value="{{ old('reminderemail') }}" name="reminderemail" class="form-control" id="inputReminderEmail" placeholder="Reminder E-mail">
            </div>
        </div>

        {{-- firstname --}}
        <div class="form-group row {{ $errors->has('firstname') ? ' has-error' : '' }}">
            <label for="inputReminderEmail" class="col-md-4 control-label">Voornaam</label>
            <div class="col-md-4">
                <input type="text" value="{{old('firstname')}}" name="firstname" class="form-control" id="inputFirstName" placeholder="Voornaam" required/>
            </div>
        </div>
        @if ($errors->has('firstname'))
            <span class="help-block">
                    <strong>{{ $errors->first('firstname') }}</strong>
                </span>
        @endif

        {{-- lastname --}}
        <div class="form-group row {{ $errors->has('lastname') ? ' has-error' : '' }}">
            <label for="inputReminderEmail" class="col-md-4 control-label">Achternaam</label>
            <div class="col-md-4">
                <input type="text" name="lastname" class="form-control" id="inputLastName" placeholder="Achternaam" required />
            </div>
        </div>
        @if ($errors->has('lastname'))
            <span class="help-block">
                    <strong>{{ $errors->first('lastname') }}</strong>
                </span>
        @endif

        {{-- wachtwoord --}}
        <div class="form-group row">
            <label for="inputReminderEmail" class="col-md-4 control-label">Wachtwoord</label>
            <div class="col-md-4">
                <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Wachtwoord" required />
            </div>
        </div>

        {{-- wachtwoord check --}}
        <div class="form-group row">
            <label for="inputReminderEmail" class="col-md-4 control-label">Wachtwoordverificatie</label>
            <div class="col-md-4">
                <input type="password" name="verifypassword" class="form-control" id="inputPassword" placeholder="Wachtwoordverificatie" required />
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

        <div class="col-md-4">
            <h3>Game</h3>
        </div>
        <div class="form-group row">
            <div class="col-md-4 halfantifixfix">
                <select name="gameid" id="inputGameID" class="form-control">
                    @foreach(App\Game::all() as $game)
                        <option value={{$game->id}}>{{$game->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>


        <div class="form-group row">
            <div class="col-md-4">
                <h3>Team</h3>
            </div>

            <div class="col-md-4 halfantifixfix">
                <input type="text" name="teamname" class="form-control" id="inputTeamName" placeholder="Teamnaam">
                <div id="members">
                    <div id="team">
                        <input type="text" class="form-control" placeholder="E-mail" name="teammembers[]">
                        <input type="text" class="form-control" placeholder="E-mail" name="teammembers[]">
                        <input type="text" class="form-control" placeholder="E-mail" name="teammembers[]">
                        <input type="text" class="form-control" placeholder="E-mail" name="teammembers[]">
                    </div>
                </div>
                <div class="alert-info small">Opgepast: als niet alle mailvelden ingevuld zijn wordt het team publiek gemaakt!</div>
            </div>
        </div>

        <button id="submitbutton" name="submitbtton" type="button" class="btn btn-primary">Submit</button>
    </form>

@stop

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/storeTeam.js') }}"></script>
@stop
