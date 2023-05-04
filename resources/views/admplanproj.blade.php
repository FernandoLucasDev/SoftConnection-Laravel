@extends('base.base')
@section('title', 'PROGRESSO')
@section('is_active_admin', 'is_active')
@section('content')

@if(session('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }}</p>
    </div>
@endif

  <br><br><p class="title_home"><strong>Projetos a serem planejados</strong></p>
  
<div class="content-progress">
  @foreach($projects as $data)
  <div class="box1">
        <h3> {{ $data->nome }} </h3><br>
        <h4 class="begin-text">  {{ $data->inicio }}  </h4><br>
        <h4 class="end-text">  {{ $data->previsao_termino }}  </h4>
        <button class="btn-card" onclick="window.location.assign('planning/ {{ $data->id }}')">Planejar</button>
    </div>
  @endforeach
  </div>
@endsection