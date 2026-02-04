<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = ['nombre', 'tipo', 'peso', 'enfermedad', 'comentarios'];

    public function duenos()
    {
        return $this->hasMany(Dueno::class);
    }
}
