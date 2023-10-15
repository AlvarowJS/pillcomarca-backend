<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentonormativa extends Model
{
    use HasFactory;

     public function Tipodedocumento()
    {
        return $this->belongsTo(Tipodedocumento::class);
    }
}
