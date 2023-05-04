@extends('base.base')
@section('title', 'PROGRESSO')
@section('is_active_progress', 'is_active')
@section('content')

@if(session('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }}</p>
    </div>
@endif

  <br><br><p class="title_home"><strong>Projetos esperando planejamento ✈️</strong></p>
  
<div class="content-progress">
  @foreach($projects as $data)
  <div class="box1">
        <h3 style="color:black;">Projeto: {{ $data->nome }} </h3><br>
        <h4 class="begin-text">Data de início desejada: {{ date('d/m/Y', strtotime($data->inicio)); }}  </h4><br>
        @if($data->status == 2)
        <p style="color:black;"> Seu projeto está em planejamento. A equipe da <strong>SoftConn</strong> está cuidando de tudo!</p>
        @elseif($data->status == 3)
        <p style="color:green;"> Seu projeto está aguardando execução. A equipe da <strong>SoftConn</strong> está buscando o melhor profissional!</p>
        @endif
    </div>
  @endforeach
  </div>
  <div class="btn-new-project" onclick="window.location.assign('/novoprojeto')" style="margin:auto; margin-bottom:2rem;">
          <p style="margin:auto;"><i class="fa-solid fa-plus icon-header"></i>Novo projeto</p>
        </div>
@endsection