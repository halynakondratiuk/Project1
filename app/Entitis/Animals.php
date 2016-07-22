<?php

namespace App\Entitis;

use Illuminate\Database\Eloquent\Model;

class Animals extends Model
{
    protected $table = 'animals';

    protected $fillable = ['name', 'reference', 'describe'];

    public function categories()
    {
        return $this->belongsTo('App\Entitis\Categories');
    }

    public function helpers()
    {
        return $this->belongsToMany('App\Entitis\Helpers');
    }

    public function helper()
    {
        return $this->belongsToMany(Helpers::class, 'animals_helpers', 'animal_id', 'helper_id');
    }


}
