@extends('base.base')
@section('title', 'LOGIN')
@section('content')

@if(session('error'))
    <div class="alert alert-danger">
        <p>{{ session('error') }}</p>
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }}</p>
    </div>
@endif

<div class="div-title-login-cad">
  <p class="login-cad-text"><strong>Login</strong></p>
</div>

<section>
  <form action="{{ route('login.do') }}" method="POST">
    @csrf
  <div class="div-form">
      <input type="text" class="input" name="email" id="email" placeholder="Seu email">
      <input type="text" class="input" name="senha" id="senha" placeholder="Sua senha"><br><br>
     <div style="margin-top: 5px; margin-bottom:20px;">
      <input type="submit" class="btn-home-inp" value="Fazer login"><br>
      <a href="/" class="txt-a-form">Não tem uma conta? Crie uma agora mesmo!</a>
    </div>
    </form>
</section>

@endsection