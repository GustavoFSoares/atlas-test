@extends('layouts.app')

@section('class', 'pokedex-background')

@section('content')
<div class="pokeatlas-container">
  <div class="list">
    <pokedex-profile :pokemon-id="{{$id}}"/>
  </div>
</div>
@endsection
