<?php

use Illuminate\Support\Facades\Route;

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


