<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario::create([
            'usuario' => 'Ivan',
            'clave' => 'ivan123456',
            'habilitado' => 1,
            'idrol' => 1
        ]);

        Usuario::create([
            'usuario' => 'Jose',
            'clave' => 'jose123456',
            'habilitado' => 1,
            'idrol' => 1
        ]);

        Usuario::create([
            'usuario' => 'Carlos',
            'clave' => 'carlos123456',
            'habilitado' => 1,
            'idrol' => 2
        ]);

        Usuario::create([
            'usuario' => 'pedro',
            'clave' => 'pedro123456',
            'habilitado' => 1,
            'idrol' => 2
        ]);

        Usuario::create([
            'usuario' => 'Juan',
            'clave' => 'juan123456',
            'habilitado' => 1,
            'idrol' => 2
        ]);
    }
}
