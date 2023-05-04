@extends('base.base')
@section('title', 'PROGRESSO')
@section('is_active_progress', 'is_active')
@section('content')

@if(session('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }}</p>
    </div>
@endif

  <br><br><p class="title_home"><strong>Projetos aguardando planejamento 🚁</strong></p>
  
<div class="content-progress">
  @foreach($projects as $data)
  <div class="box1">
        <h3 style="color:black;">Projeto: {{ $data->nome }} </h3><br>
        <h4 class="begin-text">Data de início: {{ date('d/m/Y', strtotime($data->inicio)); }}  </h4><br>
        @if($data->status == 0)
        <p style="color:black;">Seu projeto foi criado. Está aguardando triagem, o que será feito o mais rápido possível!</p>
        @elseif($data->status == 1)
        <p style="color:green;">Seu projeto passou pela triagem e sou aceito! Estamos planejando-o agora mesmo!</p>
        @endif
    </div>
  @endforeach
  </div>
  <div class="btn-new-project" onclick="window.location.assign('/novoprojeto')" style="margin:auto; margin-bottom:2rem;">
          <p style="margin:auto;"><i class="fa-solid fa-plus icon-header"></i>Novo projeto</p>
        </div>
@endsection