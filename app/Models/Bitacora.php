<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    use HasFactory;

    protected $table = 'bitacoras';

    protected $primaryKey = 'idbitacora';

    protected $fillable = [
        'idusuario',
        'fecha',
        'hora',
        'ip',
        'so',
        'navegador',
        'usuario',
    ];


    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idusuario');
    }
}
