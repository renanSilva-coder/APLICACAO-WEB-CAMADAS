<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\FuncionariosController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/avisos', function () {
    return view('avisos', array ('nome' => 'Renan', 
                            'mostrar' => true,
                            'avisos' => array( ['id'=>1,
                                                'texto'=>'Feriados adiantados galera'],
                                               
                                               ['id'=>2,
                                                'texto'=>'Hoje é hamburguer no almoço'],

                                               ['id'=>3,
                                                'texto'=>'Não temos suco'] )));
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'clientes'], function (){
    Route::get('/listar', [ClientesController::class, 'listar'])->middleware('auth');//rota que puxa a função listar na view listar e precisa de autentificação para acessar, ou seja, estar registrado no sistema
});

Route::group(['prefix' => 'funcionarios'], function (){
    Route::get('/listar', [FuncionariosController::class, 'listar'])->middleware('auth');
});

Route::group(['middleware' => ['auth']], function () {

    Route::resource('/users', UserController::class);
    Route::resource('/roles', App\Http\Controllers\RoleController::class);

});