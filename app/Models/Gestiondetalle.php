<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gestiondetalle extends Model
{
    use HasFactory;

    public function gestion()
    {
        return $this->belongsTo(Gestion::class);
    }
}
