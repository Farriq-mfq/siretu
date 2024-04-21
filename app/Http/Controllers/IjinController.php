<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IjinController extends Controller
{
    public function ijin_guru()
    {
        return view('perijinan.guru.index');
    }
}
