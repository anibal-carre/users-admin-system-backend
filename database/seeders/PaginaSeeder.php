<?php

namespace Database\Seeders;

use App\Models\Pagina;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaginaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Admin Pages

        Pagina::create([
            'url' => '/admindashboard',
            'estado' => 'activo',
            'nombre' => 'admindashboard',
            'icono' => 'dashboard',
            'tipo' => 'admin'
        ]);

        Pagina::create([
            'url' => '/admin/parametros',
            'estado' => 'activo',
            'nombre' => 'Parametros',
            'icono' => 'parametros',
            'tipo' => 'admin'
        ]);

        Pagina::create([
            'url' => '/admin/roles',
            'estado' => 'activo',
            'nombre' => 'Roles',
            'icono' => 'roles',
            'tipo' => 'admin'
        ]);

        Pagina::create([
            'url' => '/admin/usuarios',
            'estado' => 'activo',
            'nombre' => 'Usuarios',
            'icono' => 'usuarios',
            'tipo' => 'admin'
        ]);

        Pagina::create([
            'url' => '/admin/bitacoras',
            'estado' => 'activo',
            'nombre' => 'Bitacoras',
            'icono' => 'bitacoras',
            'tipo' => 'admin'
        ]);

        Pagina::create([
            'url' => '/admin/enlaces',
            'estado' => 'activo',
            'nombre' => 'Enlaces',
            'icono' => 'link',
            'tipo' => 'admin'
        ]);

        //User Pages

        Pagina::create([
            'url' => '/userdashboard',
            'estado' => 'activo',
            'nombre' => 'userdashboard',
            'icono' => 'dashboard',
            'tipo' => 'user'
        ]);

        Pagina::create([
            'url' => '/user/colegas',
            'estado' => 'activo',
            'nombre' => 'Colegas',
            'icono' => 'usuarios',
            'tipo' => 'user'
        ]);

        Pagina::create([
            'url' => '/user/enlaces',
            'estado' => 'activo',
            'nombre' => 'Enlaces',
            'icono' => 'link',
            'tipo' => 'user'
        ]);

        Pagina::create([
            'url' => '/user/historial',
            'estado' => 'activo',
            'nombre' => 'Historial',
            'icono' => 'bitacoras',
            'tipo' => 'user'
        ]);
    }
}
