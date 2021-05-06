<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Arr;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;

class UserController extends Controller
{
    
    public function index(Request $request){
        $qtd_por_pagina = 5;
        
        $data = User::orderBy('id', 'ASC')->paginate($qtd_por_pagina);
        return view('users.index', 
                compact('data'))->
                    with('i', ($request->input('page', 1) - 1) * $qtd_por_pagina);
    }

    public function create(){
        $roles = Role::pluck('name','name')->all();
        //pluck é arrancar, na linha de cima eu pelo o nome dos papeis e listo por nome
        return view('users.create', compact('roles'));
    }


    public function store(Request $request){
        $this->validate($request, 
                        [   'name' => 'required',
                            'email' => 'required|email|unique:users,email',
                            'password' => 'required|same:confirm-password',
                            'roles' => 'required']);
        
        $entrada_de_dados = $request->all();
        $entrada_de_dados['password'] = Hash::make($entrada_de_dados['password']);        
        
        $user = User::create($entrada_de_dados);
        
        $user->assignRole($request->input('roles'));//grava qual é o papel do usuário

        return redirect()->route('users.index')->with('success', 'Usuário cadastrado com sucesso!');
    }


    public function show($id){
        $user = User::find($id);
        return view('users.show', compact('user'));
    }


    public function edit($id)
    {
        $user = User::find($id);

        $roles = Role::pluck('name', 'name')->all();//Pega todos os perfis

        $userRole = $user->roles->pluck('name', 'name')->all();// pega o perfil específico do usuário 
        
        return view('users.edit', compact('user','roles','userRole'));
    }

    public function update(Request $request, $id)
    {
       $this->validate($request, 
                        [   'name' => 'required',
                            'email' => 'required|email|unique:users,email',
                            'password' => 'required|same:confirm-password',
                            'roles' => 'required']);

        $entrada_de_dados = $request->all();


        if (!empty($entrada_de_dados['password'])) {
            $entrada_de_dados['password'] = Hash::make($entrada_de_dados['password']);
        }else{
            $entrada_de_dados = Arr::except( $entrada_de_dados, ['password'] );
        }

        $user = User::find($id);

        $user->update($entrada_de_dados); 

        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')->with('success','Usuário atualziado com sucesso!');

    }

    public function destroy($id)
    {
         User::find($id)->delete();

        return redirect()->route('users.index')->with('success', 'Usuário removido com sucesso!');
    }
}
