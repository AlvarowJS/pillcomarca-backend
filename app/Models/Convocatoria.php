<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convocatoria extends Model
{
    use HasFactory;

    public function conv_base()
    {
        return $this->hasMany(Conv_base::class);
    }

    public function entrevista()
    {
        return $this->hasMany(Entrevista::class);
    }

    public function result_cv()
    {
        return $this->hasMany(Result_cv::class);
    }

    public function resultado()
    {
        return $this->hasMany(Resultado::class);
    }
}
