<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagina extends Model
{
    use HasFactory;

    protected $table = 'paginas';

    protected $primaryKey = 'idpagina';

    protected $fillable = [

        'url',
        'estado',
        'nombre',
        'descripcion',
        'icono',
        'tipo',
    ];


    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'enlaces', 'idpagina', 'idrol');
    }
}
