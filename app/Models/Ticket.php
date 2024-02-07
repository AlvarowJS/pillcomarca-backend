<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'detalle',
        'estado',
        'fecha',
        'fecha_atencion',
        'fecha_conclu',
        'conclusion',
        'urgencia',
        'urgencia_verdad',
        'hora',
        'hora_atencion',
        'hora_conclu',
        'user_id',
        'hardware_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'fecha' => 'date',
        'fecha_atencion' => 'date',
        'fecha_conclu' => 'date',
        'user_id' => 'integer',
        'hardware_id' => 'integer',
        
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function hardware(): BelongsTo
    {
        return $this->belongsTo(Hardware::class);
    }
}
