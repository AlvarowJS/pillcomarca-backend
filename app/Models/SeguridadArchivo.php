<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SeguridadArchivo extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre_archivo',
        'documento',
        'seguridad_coleccion_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'seguridad_coleccion_id' => 'integer',
    ];

    public function seguridadColeccion(): BelongsTo
    {
        return $this->belongsTo(SeguridadColeccion::class);
    }
}
