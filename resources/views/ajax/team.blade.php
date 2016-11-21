@if(!empty($teams))
@foreach($teams as $team)
  <div class="form-group row">
    <div class="checkbox col-sm-10 col-sm-offset-1">
      <label>
        <input type="radio" name="team" value="{{$team->id}}">
         {{$team->name}} - Places left: {{ ($team->game->maxPlayers) - $team->invites()->count() - $team->users()->count() }}
      </label>
    </div>
  </div>
@endforeach
@else
<div class="form-group row col-sm-offset-1">
  <p>No public teams for this game available</p>
</div>
@endif
