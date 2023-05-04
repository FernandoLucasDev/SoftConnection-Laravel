@extends('base.base')
@section('title', 'PROGRESSO')
@section('content')

<style>
  * {
padding:0;
margin:0;
vertical-align:baseline;
list-style:none;
border:0
}

/* MY CSS */

p, h1, h2, h3, h4, h5, h6, a, b {
  font-family: arial;
}

.begin-text {
  color: blue;
}

.end-text {
  color: green;
}

body {
  background: black;
}
  .header-content {
  width: 100%;
  height: 4.5rem;
  background: black;
  display: flex;
}

.logo-header {
  margin-left: 2rem;
}

.button-header {
  width: fit-content;
  padding: 2rem;
  padding-bottom: 5px;
  padding-top: 5px;
  display: flex;
  place-items: center;
  border: 1px solid white;
  color: white;
  margin: 1rem;
  margin-left: 2rem;
  border-radius: 50px;
}
.title_home {
  margin-left: 10rem;
  font-size: 3rem;
}
.icon-header {
  margin-right: 5px;
}
.div-footer {
  width: 100%;
  height: 5rem;
  display: grid;
  place-items: center;
  background: black;
  color: white;
}
</style>

<p class="title_home" style="margin-top:3rem; color:white; font-size:30px;">
  {{ $project->nome }}
<p>
  
<h3 class="inicio" style="margin-left:10rem; margin-top:2.6rem; color:#330066; font-size:30px;">
  Iniciou: {{ $project->inicio }}
</h3>
  
<h3 class="inicio2" style="margin-left:10rem; margin-top:2.6rem; color:white;">
  Data prevista de entrega: {{ $project->previsao_termino }}
</h3>



@endsection