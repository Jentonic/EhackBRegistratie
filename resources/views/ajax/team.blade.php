@if(!empty($teams))
@foreach($teams as $team)
  <div class="form-group row checkbox">
      <label>
        <input type="radio" name="team" value="{{$team->id}}">
         {{$team->name}} - Plaatsen: {{ ($team->game->maxPlayers) - $team->invites()->count() - $team->users()->count() }}
      </label>
  </div>
@endforeach
@else
  <p>Geen publieke teams beschikbaar voor deze game</p>
@endif
