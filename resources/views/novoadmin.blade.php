@extends('base.base')
@section('title', 'Cadastro de Admin')
@section('content')

<section>
  <p class="title_home">Cadastro de novo admin</p>
  <div class="back-admin">
    <form method="POST" action="{{ route('cadastro.admin') }}">
    @csrf

        <input type="text" name="nome" id="nome" placeholder="Nome" class="input" required>
   
        <input type="email" name="email" id="email" placeholder="Email" class="input" required>
   
        <input type="password" name="senha" id="senha" placeholder="Senha" class="input" required>
   
        <input type="text" name="cargo" id="cargo" placeholder="Cargo" class="input" required>
    <br><br>
    <button type="submit" class="input-send">Enviar</button>
</form>

  </div>
</section>

@endsection