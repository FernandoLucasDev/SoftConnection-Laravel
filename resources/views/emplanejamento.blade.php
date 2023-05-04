@extends('base.base')
@section('title', 'EMPLANEJAMENTO')
@section('content')

@if(session('success'))
    <div class="alert alert-success">
        <p>rtt</p>
    </div>
@endif

  <br><br><p class="title_home"><strong>Projetos em andamento</strong></p>
  
<div class="content-progress">

  <div class="box1">
        <h3> projeto </h3><br>
        <h4 class="begin-text">  02/02/2023  </h4><br>
        <h4 class="end-text">  03/04/2023  </h4>
        <button onclick="window.location.assign>Ver mais</button>
    </div>
  
  </div>
  <div class="button-header" onclick="window.location.assign('/novoprojeto')" style="width:15rem; padding:1rem; background:green; margin:auto; margin-bottom:2rem;">
          <p style="margin:auto;"><i class="fa-solid fa-plus icon-header"></i>Novo projeto</p>
        </div>
@endsection