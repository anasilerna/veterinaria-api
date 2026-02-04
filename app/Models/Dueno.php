<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dueno extends Model
{
    protected $table = 'duenos';

    protected $fillable = ['nombre', 'apellido', 'animal_id'];

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
}
