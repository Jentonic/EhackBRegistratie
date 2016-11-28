@extends('layouts.register')

@section('content')
@if(!empty($succ))
<div class="alert alert-success">
    <p> {{ $succ }}</p>
</div>
@else
  <div class="alert alert-danger">
      <p>{{ $err }}</p>
  </div>
@endif
@stop
