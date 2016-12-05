@if(!empty($teams))
@foreach($teams as $team)
  <div class="form-group row checkbox">
      <label>
        <input type="radio" name="team" value="{{$team->id}}">
         {{$team->name}} - Plaatsen: {{ ($team->game->maxPlayers) - $team->invites()->count() - $team->users()->count() }} - <br/><a class="btn btn-info" href="mailto:{{ $team->leader->email }}" target="_top">Mail naar de teamleader</a>
      </label>
  </div>
@endforeach
@else
  <p>Geen publieke teams beschikbaar voor deze game</p>
@endif
