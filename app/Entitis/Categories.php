<?php

namespace App\Entitis;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';

    protected $fillable = ['name'];
    
    public function animals()
    {
        return $this->hasMany('App\Entitis\Animals');
    }
}
