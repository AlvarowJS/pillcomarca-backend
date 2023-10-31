<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SeguridadColeccion extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre_coleccion',
        'seguridad_categoria_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'seguridad_categoria_id' => 'integer',
    ];

    public function seguridadArchivos(): HasMany
    {
        return $this->hasMany(SeguridadArchivo::class);
    }

    public function seguridadCategoria(): BelongsTo
    {
        return $this->belongsTo(SeguridadCategoria::class);
    }
}
