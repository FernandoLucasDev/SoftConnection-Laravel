<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Developer;
use App\Models\Customers;
use App\Models\Projects;
use App\Models\Admins;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
  public function home(){
    return view('welcome');
  }


  public function cadastroDev(){
    return view('caddev');
  }

  public function cadastroClient(){
    return view('cadclient');
  }

  public function emPlanejamento(){
    return view('emplanejamento');
  }

  public function admin(){
    return view('admin');
  }

  public function adminForm(){
    return view('novoadmin');
  }

   public function progresso($id){
     
    $project = DB::table('projects')
                ->where('id', '=', $id)
                ->first();
     
    return view(
      'progress',
      [
      'project'=>$project
      ]
    );
  }

  public function admPlanningProject($id){
     
    $project = DB::table('projects')
                ->where('id', '=', $id)
                ->first();
     
    return view(
      'admplannig',
      [
      'project'=>$project
      ]
    );
  }
  
  public function salvarCadastroDev(Request $request)
{

      $empresa = null;
      $cv = null;
      
      if($request->has('is_company')){
        $empresa = true;
      } else {
        $empresa = false;
      }

      if($request->hasFile('cv') && $request->file('cv')->isValid()){
            $requestCv = $request->cv;
            $extension = $requestCv->extension();
            $cvName = md5($requestCv->getClientoriginalName() . strtotime('now') . "." . $extension);

            $request->cv->move(public_path('/cvs/dev'), $cvName);

            $cv = $cvName;
        }
  
      $developerData = [
          'nome' => $request->input('nome'),
          'email' => $request->input('email'),
          'telefone' => $request->input('telefone'),
          'senha' => $request->input('senha'),
          'profissao' => $request->input('profissao'),
          'stack' => $request->input('stack'),
          'cpf_cnpj' => $request->input('cpf_cnpj'),
          'is_company' => $empresa,
          'curriculo' => $cv,
      ];
  
      $userData = [
        'name' => $request->input('nome'),
        'email' => $request->input('email'),
        'password' => $request->input('senha')
      ];

      if($request->input('senha') == $request->input('senhaConfirma')){
        try{
        User::create($userData);
        Developer::create($developerData);
        return redirect('/login')->with('success', 'Cadastro realizado com sucesso! Faça login:');
    
        } catch(\Illuminate\Database\QueryException $ex) {
          $errorCode = $ex->errorInfo[1];
          if($errorCode == 1062){
              return redirect('/devcad')->with('error', 'O email informado já está em uso.');
        }
      }
  } else {
      return redirect('/devcad')->with('error', 'As senhas devem ser iguais!');
  }
  return redirect('/devcad')->with('error', 'Ocorreu um erro ao cadastrar o usuário.');
}

  
  public function CadClient(Request $request)
    {
      $empresa = null;
      
      if($request->has('is_company')){
        $empresa = true;
      } else {
        $empresa = false;
      }
        $customerData = [
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'senha' => $request->senha,
            'cpf_cnpj' => $request->cpf_cnpj,
            'razao_social' => !empty($request->razao_social) ? $request->razao_social : 'pf',
            'area_atuacao' => !empty($request->area_atuacao) ? $request->area_atuacao : 'pf',
            'is_company' => $empresa
        ];

        $userData = [
          'name' => $request->nome,
          'email' => $request->email,
          'password' => $request->senha
        ];

        try {
          if($request->confirma_senha == $request->senha){
            User::create($userData);
            Customers::create($customerData);
            return redirect('/login')->with('success', 'Cadastro realizado com sucesso! Faça login:');
          } else {
            return redirect('/clicad')->with('error', 'As senhas devem ser iguais.');
          }
        } catch(\Illuminate\Database\QueryException $ex) {
          $errorCode = $ex->errorInfo[1];
          if($errorCode == 1062){
              return redirect('/clicad')->with('error', 'O email informado já está em uso.');
        }
    return redirect('/clicad')->with('error', 'Ocorreu um erro ao cadastrar o usuário.');
  }  
    }

  public function logar(Request $request)
{
  
    $data = [
      'email' => $request->email,
      'password' => $request->senha
    ];

    $hasUser = User::where('email', '=', $data['email'])->exists();

    if($hasUser){
      $pass = User::where('email', '=', $data['email'])->first();
      $typeDev = Developer::where('email', '=', $pass->email)->first();
      $typeCli = Customers::where('email', '=', $pass->email)->first();
      $typeAdm = Admins::where('email', '=', $pass->email)->first();
      $type = null;
      if($typeDev){
        $type = 'D';
      } else if($typeCli) {
        $type = 'C';
      } else if($typeAdm) {
        $type = 'A';
      }
      
      if($pass->password == $data['password']) {
        session(['isLogged' => true]);
        session(['id' => $pass->id]);
        session(['email' => $pass->email]);
        session(['type' =>  $type]);
        if($type == 'A'){
          return redirect('/admin')->with('success', 'Você está logado como admin');
        } else if($type == 'C') {
          return redirect('/cliprogress')->with('success', 'Você está logado');
        } else if($type == 'D') {
          return redirect('/')->with('success', 'Você está logado');
        }
      } else {
        return redirect('/login')->with('error', 'Senha incorreta');
      }
    } else {
      return redirect('/login')->with('error', 'Email incorreto');
        session(['isLogged' => false]);
        session(['id' => null]);
        session(['email' => null]);
        session(['type' =>  null]);
    }
}

  public function logout(){
        session(['isLogged' => false]);
        session(['id' => null]);
        session(['email' => null]);
        session(['type' =>  null]);
    return redirect('/')->with('success', 'Você está deslogado');
  }

   public function criarNovo(Request $request)
    {
        $data = [
            'client' => session('email'),
            'developer' => 'email@email.com',
            'nome' => $request->input('nome'),
            'descrição' => $request->input('desc'),
            'inicio' => $request->input('date_start'),
            'previsao_termino' => $request->input('date_start'),
            'porcentagem' => 0,
            'is_finished' => false,
            'status' => 0
        ];

        Projects::create($data);

        return redirect('/clitoplannig')->with('success', 'Projeto criado com sucesso!');
    }

  public function cadAdmin(Request $request)
    {
        $data = [
            'nome' => $request->nome,
            'email' => $request->email,
            'senha' => $request->senha,
            'cargo' => $request->cargo,
        ];

      $userData = [
          'name' => $request->nome,
          'email' => $request->email,
          'password' => $request->senha
        ];
        User::create($userData);
        Admins::create($data);

        return redirect('/admin')->with('success', 'Cadastro realizado com sucesso!');
    }


  public function login(){
    return view('login');
  }

  public function formNovoProjeto(){
    return view('create');
  }

  public function projectsProgressClient(){
    // Para o status 4 e 5, execução e finalização
    $projects = DB::table('projects')
                ->where('client', '=', session('email'))
                ->where(function ($query) {
                    $query->where('status', '=', 4)
                          ->orWhere('status', '=', 5);
                })
                ->get();
    
    return view(
      'clientprojectsprogress',
      [
      'projects' => $projects
      ]
    );
  }

public function projectsProgressClientPlannig(){
    // Para o status 2 e 3, planejamento e aguardando execuçaõ
    $projects = DB::table('projects')
                ->where('client', '=', session('email'))
                ->where(function ($query) {
                    $query->where('status', '=', 2)
                          ->orWhere('status', '=', 3);
                })
                ->get();
    
    return view(
      'waitplannigclient',
      [
      'projects' => $projects
      ]
    );
  }

public function projectsProgressClientWaiting(){
    // Para o status 0 e 1, para planejar e aprojeto aceito
    $projects = DB::table('projects')
                ->where('client', '=', session('email'))
                ->where(function ($query) {
                    $query->where('status', '=', 0)
                          ->orWhere('status', '=', 1);
                })
                ->get();
    
    return view(
      'toplannigclient',
      [
      'projects' => $projects
      ]
    );
  }

  public function projectsListDev() {
    $projects = DB::table('projects')
                ->where('developer', '=', session('email'))
                ->get();

    return view(
      'devprojectslist',
      [
      'projects' => $projects
      ]
    );
  }

  public function AdmPlanning(){
    $projects = DB::table('projects')
                ->where('is_planning', '=', 0)
                ->get();
    
    return view(
      'admplanproj',
      [
      'projects' => $projects
      ]
    );
  }
  public function AdmProgress(){
    $projects = DB::table('projects')
                ->where('is_planning', '=', 1)
                ->get();
    
    return view(
      'admprogress',
      [
      'projects' => $projects
      ]
    );
  }
}
