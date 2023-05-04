@extends('base.base')
@section('title', 'CRIAR')
@section('is_active_customers', 'is_active')
@section('content')
<section>
  
  <div class="div-title-login-cad">
  <p class="login-cad-text"><strong>Crie um novo projeto</strong></p>
</div>
  
  <form method="POST" action="{{ route('projects.store') }}">
  @csrf
  <div class="div-form">
      <p>Nome do seu projeto:</p>
    <input type="text" class="input" name="nome" id="nome" placeholder="Qual o nome de seu projeto?"><br>
    <p>Quando deseja dar início ao projeto?</p>
    <input type="date" class="input" name="date_start" id="date_start" placeholder="Quando deseja iniciar?"><br>
    <p>Descreva seu projeto:</p>
    <textarea type="password" class="textarea" name="desc" id="desc"></textarea>
    <br><br>
      <input type="submit" class="input-send" value="Cadastrar">
  </div>
</form>
<div style="width:100%; display:grid; place-items:center; padding-bottom:15px;">
</section>
@endsection