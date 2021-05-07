<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class SeederTabelaPermissions extends Seeder
{

    public function run()
    {
        $permissions = ['role-list',
        				'role-create',
        				'role-edit',
        				'role-delete',
        				'cliente-list',
        				'cliente-create',
        				'cliente-edit',
        				'cliente-delete'
        				];

        foreach ($permissions as $permission) {
        	Permission::create(['name' => $permission]);
        }
    }
}
