@extends('base.base')
@section('title', 'HOME')
@section('content')
@section('is_active_home', 'is_active')

@if(session('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }}</p>
    </div>
@endif

<style>
  body {
    background-image: url('https://images.unsplash.com/photo-1599045150592-72582a024791?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80');
    background-repeat: no-repeat;
  background-size: cover;
  }
</style>

@if(!session('isLogged'))
<section>
  <div class="back-home">
        <div class="content-home-div-img" style="">
        <img src="{{ asset('img/logo.png') }}" class="img-logo-home" alt="logotipo">
      </div>
      <div class="content-home-div">
       <div class="center-mob"><p class="title-1" style=""><strong>Sou cliente</strong></p></div>
        <p style="" class="txt-presentation">Olá, bem vindo a SoftConn. Nosso objetivo é te ajudar a executar seu projeto da melhor forma possível. Aqui, planejaremos o projeto junto com você, pensaremos juntos e vamos buscar o melhor profissional para a execução do mesmo. Aqui você fica por dentro de tudo! Desde o andamento do projeto em porcentagem até a maneira como está sendo exucutado! <strong>Cadastre-se já:</strong></p>
        <div class="div-center-button">
          <button onclick="window.location.assign('/clicad')" class="btn-home"><strong>Acessar como cliente</strong></button>
        </div>
      </div>
      <div class="content-home-div" style="">
       <div class="center-mob"><p class="title-1" style=""><strong>Sou Desenvolvedor</strong></p></div>
        <p style="" class="txt-presentation">Você, desenvolvedor, pode se cadastrar em nossa plataforma para receber projetos. Aqui você tem mais chanches de conseguir uma boa proposta! Faça do seu jeito: escolha desde o framework que vai trabalhar até seu modelo de trabalho. Te garantiremos liberdade de criação de execução! E se desejar, podemos trabalhar com metodologias ágeis! <strong>Cadastre-se já:</strong></p>
        <div class="div-center-button">
          <button onclick="window.location.assign('/devcad')" class="btn-home"><strong>Acessar como desenvolvedor</strong></button>
        </div>
      </div>
    </div>
</section>
@elseif(session('type') == 'C')
<script>
  window.location.assign('/cliprogress');
</script>
@endif

@endsection