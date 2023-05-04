@extends('base.base')
@section('title', 'CADASTRO')
@section('is_active_customers', 'is_active')
@section('content')

@if(session('error'))
    <div class="alert alert-danger">
        <p>{{ session('error') }}</p>
    </div>
@endif

<div class="div-title-login-cad">
  <p class="login-cad-text"><strong>Cadastro de Cliente</strong></p>
</div>

<section>
  <form method="POST" action="{{ route('customers.store') }}">
  @csrf
  <div class="div-form">
    <input type="text" class="input" name="nome" id="nome" placeholder="Seu nome completo">
    <input type="text" class="input" name="email" id="email" placeholder="O seu melhor email">
    <input type="text" class="input" name="telefone" id="telefone" placeholder="Seu telefone">
    <input type="password" class="input" name="senha" id="senha" placeholder="Digite uma senha">
    <input type="password" class="input" name="confirma_senha" id="confirma_senha" placeholder="Confirme a sua senha">
    <input type="text" class="input" name="cpf_cnpj" id="cpf_cnpj" placeholder="CPF ou CNPJ">
    <br>
    <div class="div-switch-txt">
    <p class="txt-switch">É uma empresa?</p>
    <div class="switch" onclick="appearInput();">
      <input type="checkbox"  name="is_company" id="is_company" class="switch-input">
      <label for="is_company" class="switch-label"></label>
    </div>
    </div>
    <br>
    <input type="text" class="input" name="razao_social" id="razao_social" placeholder="Sua razão social" style="display:none">
    <input type="text" class="input" name="area_atuacao" id="area_atuacao" placeholder="Sua razão social" style="display:none">
    <br>
    <div class="bottom-submit">
      <input type="submit" class="btn-home-inp" value="Cadastrar"><br>
      <a href="/login" class="txt-a-form">Já tem uma conta? Faça login!</a>
    </div>
  </div>
</form>
</section>

<script>
  const switchInput = document.querySelector('.switch');
  const switchLabel = document.querySelector('.switch-label');
  const inputName1 = document.getElementById('area_atuacao');
  const inputName2 = document.getElementById('razao_social');
  
  switchLabel.addEventListener('click', function() {
    switchInput.checked = !switchInput.checked;
  });

  function appearInput() {
    if (switchInput.checked) {
    inputName1.style.display = 'block';
    inputName2.style.display = 'block';
  } else {
    inputName1.style.display = 'none';
    inputName2.style.display = 'none';
    inputName.value = '';
  }
  }
</script>

@endsection