@extends('base.base')
@section('title', 'Admin')
@section('is_active_admin', 'is_active')
@section('content')

@if(session('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }}</p>
    </div>
@endif

<section>
  <div class="back-admin">
    <div class="options-admin">
      <div class="admin-options-header"><p>Opções:</p></div>
      <br>
      <a href="/amdplanning">Ver projetos pendentes de planejamento -></a>
      <br>
       <a href="/amdprogress">Ver projetos em andamento -></a>
      <br>
      <a href="/">Ver desenvolvedores capacitados por stack -></a>
      <br>
      <a href="/novoadmin">Cadastro de novo superusuário admin -></a>
      <br>
    </div>
  </div>
</section>

@endsection