<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClientesController extends Controller{


	use HasFactory;
    use HasRoles;
    
    // Essa é uma forma de controlar o acesso, permitindo só quem está autentificado, ou seja, tem 'auth' que é quem tem registro;
    public function __construct(){
        $this->middleware('permission:cliente-list',['only' => ['index','show']]);
        $this->middleware('permission:cliente-create',['only' => ['create','store']]);
        $this->middleware('permission:cliente-edit',['only' => ['edit','update']]);
        $this->middleware('permission:cliente-delete',['only' => ['destroy']]);
    }

    public function listar(){
        $clientes = Cliente::all();
        return view('clientes.listar', ['clientes' => $clientes]);
    }


    public function index(Request $request){
        $qtd_por_pagina = 5;
        
        $data = Cliente::orderBy('id', 'ASC')->paginate($qtd_por_pagina);
        return view('clientes.index', 
                compact('data'))->
                    with('i', ($request->input('page', 1) - 1) * $qtd_por_pagina);
    }

    public function create(){
        $roles = Role::pluck('name','name')->all();
        //pluck é arrancar, na linha de cima eu pelo o nome dos papeis e listo por nome
        return view('clientes.create', compact('roles'));
    }


    public function store(Request $request){
        $this->validate($request, 
                        [   'nome' => 'required',
                            'email' => 'required|email|unique:cliente,email',
                            'roles' => 'required']);
        
        $entrada_de_dados = $request->all();
         
        $cliente = Cliente::create($entrada_de_dados);
        
        $cliente->assignRole($request->input('roles'));//grava qual é o papel do usuário

        return redirect()->route('clientes.index')->with('success', 'Cliente cadastrado com sucesso!');
    }


    public function show($id){
        $cliente = Cliente::find($id);
        return view('clientes.show', compact('cliente'));
    }


    public function edit($id)
    {
        $cliente = Cliente::find($id);

        $roles = Role::pluck('name', 'name')->all();//Pega todos os perfis

        $clienteRole = $cliente->roles->pluck('name', 'name')->all();// pega o perfil específico do usuário 
        
        return view('clientes.edit', compact('cliente','roles','clienteRole'));
    }

    public function update(Request $request, $id)
    {
       $this->validate($request, 
                        [   'nome' => 'required',
                            'email' => 'required|email|unique:cliente,email',
                            'roles' => 'required']);

        $entrada_de_dados = $request->all();

        $cliente = Cliente::find($id);

        $cliente->update($entrada_de_dados); 

        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $cliente->assignRole($request->input('roles'));

        return redirect()->route('clientes.index')->with('success','Cliente atualziado com sucesso!');

    }

    public function destroy($id)
    {
         Cliente::find($id)->delete();

        return redirect()->route('clientes.index')->with('success', 'Cliente removido com sucesso!');
    }
}
