<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Funcionario;
use Spatie\Permissions\Models\Role;
use Spatie\Permissions\Models\Permission;


class SeederFuncionarioAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $funcionarios = Funcionario::create([ 'nome' => 'Raphael Funcionario',
                            				  'email' => 'ralf@gmail.com',
                            				  'telefone' => 11995566884,
                            				  'endereco' => 'Rua Ralf, 202']);
    }
}
