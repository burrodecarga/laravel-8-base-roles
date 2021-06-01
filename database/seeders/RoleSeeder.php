<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gerente = Role::create(['name' => 'gerente']);
        $gerente->syncPermissions([
            'crear curso',
            'leer curso',
            'actualizar curso',
            'eliminar curso',
            'ver dashboard',
            'crear role',
            'listar role',
            'eliminar role',
            'leer usuarios',
            'editar usuario',
        ]);
        $instructor = Role::create(['name' => 'instructor']);
        $instructor->syncPermissions([
            'crear curso',
            'leer curso',
            'actualizar curso',
            'eliminar curso',
            'ver dashboard',
        ]);
    }
}
