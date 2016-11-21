@foreach($teams as $team)
  <div class="form-group row">
    <div class="checkbox col-sm-10 col-sm-offset-1">
      <label><input type="radio" name="team"value="{{$team->id}}">{{$team->name}} - Places left: {{$team->game->maxPlayers - $team->users->count()}}</label>
    </div>
  </div>
@endforeach
