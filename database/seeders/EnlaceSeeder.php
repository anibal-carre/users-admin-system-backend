<?php

namespace Database\Seeders;

use App\Models\Enlace;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Enlace::create([
            'idrol' => '1',
            'idpagina' => '1'
        ]);

        Enlace::create([
            'idrol' => '1',
            'idpagina' => '2'
        ]);

        Enlace::create([
            'idrol' => '1',
            'idpagina' => '3'
        ]);

        Enlace::create([
            'idrol' => '1',
            'idpagina' => '4'
        ]);

        Enlace::create([
            'idrol' => '1',
            'idpagina' => '5'
        ]);

        Enlace::create([
            'idrol' => '1',
            'idpagina' => '6'
        ]);

        Enlace::create([
            'idrol' => '2',
            'idpagina' => '7'
        ]);

        Enlace::create([
            'idrol' => '2',
            'idpagina' => '8'
        ]);

        Enlace::create([
            'idrol' => '2',
            'idpagina' => '9'
        ]);

        Enlace::create([
            'idrol' => '2',
            'idpagina' => '10'
        ]);
    }
}
