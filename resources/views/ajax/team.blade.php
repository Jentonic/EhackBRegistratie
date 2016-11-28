@if(!empty($teams))
@foreach($teams as $team)
  <div class="form-group row">
    <div class="checkbox col-sm-4">
      <label>
        <input type="radio" name="team" value="{{$team->id}}">
         {{$team->name}} - Plaatsen: {{ ($team->game->maxPlayers) - $team->invites()->count() - $team->users()->count() }}
      </label>
    </div>
  </div>
@endforeach
@else
<div class="form-group row col-sm-offset-1">
  <p>Geen publieke teams beschikbaar voor deze game</p>
</div>
@endif
