<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class WorksController extends Controller
{
    public function work()
    {
        return view('task1');
    }
}