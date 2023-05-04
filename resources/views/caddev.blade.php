@extends('base.base')
@section('title', 'CADASTRO')
@section('is_active_devs', 'is_active')
@section('content')

@if(session('error'))
    <div class="alert alert-danger">
        <p>{{ session('error') }}</p>
    </div>
@endif

@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif


<div class="div-title-login-cad">
  <p class="login-cad-text"><strong>Cadastro de Desenvolvedor</strong></p>
</div>

<section>
  <form method="POST" action="{{ route('cadastro.dev') }}" enctype="multipart/form-data">
    @csrf
  <div class="div-form">
      <input type="text" class="input" name="nome" placeholder="Seu nome completo" required>
      <input type="email" class="input" name="email" placeholder="O seu melhor email" required>
      <input type="text" class="input" name="telefone" placeholder="Seu número de celular" required>
      <input type="password" class="input" name="senha" placeholder="Digite uma senha" required>
      <input type="password" class="input" name="senhaConfirma" placeholder="Confirme sua senha" required>
      <input type="text" class="input" name="cpf_cnpj" placeholder="Seu CPF ou CNPJ" required>
      <br>
      <div class="input-select" style="">
        <div class="box-select">
          <p>Selecione sua profissão:</p>
          <select name="profissao" id="profissao" class="input-sel" style="" required>
          <option value="dev">Desenvolvedor de software</option>
          <option value="qa">QA</option>
          <option value="administrador">Administrador</option>
          <option value="administrador">Administrador</option>
          <option value="advogado">Advogado</option>
          <option value="analista_ti">Analista de TI</option>
          <option value="contador">Contador</option>
          <option value="dentista">Dentista</option>
          <option value="designer">Designer</option>
          <option value="enfermeiro">Enfermeiro</option>
          <option value="engenheiro_civil">Engenheiro Civil</option>
          <option value="engenheiro_mecanico">Engenheiro Mecânico</option>
          <option value="farmaceutico">Farmacêutico</option>
          <option value="fisioterapeuta">Fisioterapeuta</option>
          <option value="médico">Médico</option>
          <option value="nutricionista">Nutricionista</option>
          <option value="pedagogo">Pedagogo</option>
          <option value="professor">Professor</option>
          <option value="psicologo">Psicólogo</option>
          <option value="publicitario">Publicitário</option>
          <option value="recepcionista">Recepcionista</option>
          <option value="secretario">Secretário</option>
          <option value="tecnico_enfermagem">Técnico em Enfermagem</option>
          <option value="tecnico_informatica">Técnico em Informática</option>
          <option value="tecnico_seguranca">Técnico em Segurança do Trabalho</option>
          <option value="vendedor">Vendedor</option>
          <option value="zootecnico">Zootecnista</option>
        </select>
        </div>
        <div>
          <p>Caso seja um desenvolvedor, selecione sua stack principal:</p>
          <select name="stack" id="stack" class="input-sel" style="" required>
          <option value="python">Python</option>
          <option value="javascript">JavaScript</option>
          <option value="java">Java</option>
          <option value="c">C</option>
          <option value="c++">C++</option>
          <option value="php">PHP</option>
          <option value="ruby">Ruby</option>
          <option value="go">Go</option>
          <option value="swift">Swift</option>
          <option value="kotlin">Kotlin</option>
          <option value="typescript">TypeScript</option>
          <option value="rust">Rust</option>
          <option value="scala">Scala</option>
          <option value="dart">Dart</option>
          <option value="elixir">Elixir</option>
          <option value="perl">Perl</option>
          <option value="lua">Lua</option>
          <option value="haskell">Haskell</option>
          <option value="r">R</option>
          <option value="matlab">MATLAB</option>
          <option value="sql">SQL</option>
          <option value="bash">Bash</option>
          <option value="powershell">PowerShell</option>
          <option value="html">HTML</option>
          <option value="css">CSS</option>
          <option value="react">React</option>
          <option value="vue">Vue.js</option>
          <option value="angular">Angular</option>
          <option value="django">Django</option>
          <option value="rails">Ruby on Rails</option>
          <option value="laravel">Laravel</option>
          <option value="spring">Spring</option>
          <option value="express">Express</option>
          <option value="flask">Flask</option>
          <option value="node">Node.js</option>
          <option value="nestjs">NestJS</option>
          <option value="symfony">Symfony</option>
          <option value="yii">Yii</option>
          <option value="codeigniter">CodeIgniter</option>
      </select>
        </div>
      </div>
      <div class="file-input-wrapper">
        <br>
        <label for="file-input" class="file-input-label">Anexe seu currículo em PDF ou WORD</label>
        <input type="file" id="cv" name="cv" class="file-input" required/>
        <span id="file-name" class="file-name"></span>
      </div>
      <div class="div-switch-txt">
        <p class="txt-switch">É uma empresa?</p>
        <div class="switch" onclick="appearInput();">
          <input type="checkbox"  name="is_company" id="is_company" class="switch-input">
          <label for="is_company" class="switch-label"></label>
        </div>
    </div>
    <br>
    <div>
      <input type="submit" class="btn-home-inp" value="Cadastrar"><br>
      <a href="/login" class="txt-a-form">Já tem uma conta? Faça login!</a>
    </div>
  </div>
    </form>
</section>

<script>
  const fileInput = document.getElementById("cv");
  const fileName = document.getElementById("file-name");
  
  fileInput.addEventListener("change", function() {
    fileName.textContent = fileInput.files[0].name;
  });
</script>


@endsection