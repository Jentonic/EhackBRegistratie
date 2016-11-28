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
                <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Wachtwoordverificatie" required />
            </div>
        </div>

        {{-- activities --}}
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

        {{-- options --}}
        <div class="col-md-4">
            <h3>Extra Opties</h3>
        </div>
        <div class="form-group row">
            @foreach($options as $option)
                <div class="checkbox col-md-4">
                    <label><input type="checkbox" name="options[]"value="{{$option->id}}">{{$option->name}} - Prijs: €{{ number_format($option->price,2) }}</label>
                </div>
            @endforeach
        </div>

        <div class="col-md-4">
            <h3>Game</h3>
        </div>
        <div class="form-group row">
            <div class="col-md-4">
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

            <div class="col-md-4">
                <input type="text" name="teamname" class="form-control" id="inputTeamName" placeholder="Teamnaam">
                <div id="members">
                    <div id="team">
                        <input type="text" class="form-control" placeholder="E-mail" name="teammembers[]">
                        <input type="text" class="form-control" placeholder="E-mail" name="teammembers[]">
                        <input type="text" class="form-control" placeholder="E-mail" name="teammembers[]">
                        <input type="text" class="form-control" placeholder="E-mail" name="teammembers[]">
                    </div>
                </div>
            </div>

        </div>

        <button id="submitbutton" name="submitbtton" type="button" class="btn btn-primary">Submit</button>
    </form>

@stop

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/storeTeam.js') }}"></script>
@stop
