<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RegistroVisita extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fecha',
        'asunto',        
        'hora_ingreso',
        'hora_salida',
        'depedencia_id',
        'user_id',
        'usuario_publico_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        // 'fecha' => 'date',
        // 'hora_ingreso' => 'datetime',
        // 'hora_salida' => 'datetime',
        'user_id' => 'integer',
        'usuario_publico_id' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function usuarioPublico(): BelongsTo
    {
        return $this->belongsTo(UsuarioPublico::class);
    }
    public function depedencia(): BelongsTo
    {
        return $this->belongsTo(Dependencia::class);
    }
}
