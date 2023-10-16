<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentonormativa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'fecha',
        'descripcion',
        'archivo',
        'tipodedocumento_id'

    ];
    protected $casts = [
        'id' => 'integer',
    ];

     public function Tipodedocumento()
    {
        return $this->belongsTo(Tipodedocumento::class);
    }
}
