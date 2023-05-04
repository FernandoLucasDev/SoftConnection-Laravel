<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

  Route::get('/', [WebController::class, 'home']);

  Route::get('/admin', [WebController::class, 'admin']);

  Route::get('/novoadmin', [WebController::class, 'adminForm']);

  Route::get('/projectsdev', [WebController::class, 'projectsListDev']);

  Route::get('/logout', [WebController::class, 'logout']);

  Route::get('/progresso/{id}', [WebController::class, 'progresso']);

  Route::get('planning/{id}', [WebController::class, 'admPlanningProject']);

  Route::get('/cliprogress', [WebController::class, 'projectsProgressClient']);

  Route::get('/cliplannig', [WebController::class, 'projectsProgressClientPlannig']);

  Route::get('/clitoplannig', [WebController::class, 'projectsProgressClientWaiting']);
 
  Route::get('/devcad', [WebController::class, 'cadastroDev']);

  Route::get('/clicad', [WebController::class, 'cadastroClient']);

  Route::get('/amdplanning', [WebController::class, 'AdmPlanning']);

  Route::get('/amdprogress', [WebController::class, 'AdmProgress']);

  Route::get('/login', [WebController::class, 'login']);

  Route::get('/emplanejamento', [WebController::class, 'emPlanejamento']);

  Route::get('/novoprojeto', [WebController::class, 'formNovoProjeto']);

  Route::post('/cadastro/dev', [WebController::class, 'salvarCadastroDev'])->name('cadastro.dev');

  Route::post('/customers', [WebController::class, 'CadClient'])->name('customers.store');
  
  Route::post('/logar', [WebController::class, 'logar'])->name('login.do');

  Route::post('/projects', [WebController::class, 'criarNovo'])->name('projects.store');

  Route::post('/cadastro', [WebController::class, 'cadAdmin'])->name('cadastro.admin');





