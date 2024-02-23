<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hardware extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tipo',
        'procesador',
        'ram',
        'almacenamiento',
        'tipo_alma',
        'ip',
        'marca',
        'especif',
        'cod_patri',
        'user_id',
        'tipo_id',
        'dependencia_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public function dependencia()
    {
        return $this->belongsTo(Dependencia::class);
    }
    public function tipo()
    {
        return $this->belongsTo(Tipo::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
