<?php

namespace App\Entitis;

use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    protected $table = "notes";

    protected $fillable=[
        'name',
        'email',
        'message'
    ];

}
