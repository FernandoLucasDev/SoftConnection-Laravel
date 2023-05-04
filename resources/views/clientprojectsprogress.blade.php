@extends('base.base')
@section('title', 'PROGRESSO')
@section('is_active_progress', 'is_active')
@section('content')

@if(session('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }}</p>
    </div>
@endif

  <br><br><p class="title_home"><strong>Projetos em andamento 🚀</strong></p>
  
<div class="content-progress">
  @foreach($projects as $data)
  <div class="box1">
        <h3 style="color:black;">Projeto: {{ $data->nome }} </h3><br>
        <h4 class="begin-text">Data de início: {{ date('d/m/Y', strtotime($data->inicio)); }}  </h4><br>
        <h4 class="end-text">Previsão de termino: {{ date('d/m/Y', strtotime($data->previsao_termino)); }}  </h4>
        <button class="btn-card" onclick="window.location.assign('progresso/ {{ $data->id }}')">Ver mais</button>
    </div>
  @endforeach
  </div>
  <div class="btn-new-project" onclick="window.location.assign('/novoprojeto')" style="margin:auto; margin-bottom:2rem;">
          <p style="margin:auto;"><i class="fa-solid fa-plus icon-header"></i>Novo projeto</p>
        </div>
@endsection