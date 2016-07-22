<?php

namespace App\Entitis;

use Illuminate\Database\Eloquent\Model;

class Helpers extends Model
{
    protected $table = 'helpers';

    protected $fillable = ['email'];
    
    public function animals()
    {
        return $this->belongsToMany(Animals::class, 'animals_helpers', 'animal_id', 'helper_id');
    }

    public function animal()
    {
        return $this->hasMany('App\Entitis\Animals');
    }
}
