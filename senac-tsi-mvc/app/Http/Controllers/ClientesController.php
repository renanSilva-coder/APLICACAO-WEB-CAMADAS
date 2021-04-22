<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClientesController extends Controller{

    // Essa é uma forma de controlar o acesso, permitindo só quem está autentificado, ou seja, tem 'auth' que é quem tem registro 
    // public function __construct(){
    //     $this->middleware('auth');
    // }

    public function listar(){
        $clientes = Cliente::all();
        return view('clientes.listar', ['clientes' => $clientes]);
    }
}
