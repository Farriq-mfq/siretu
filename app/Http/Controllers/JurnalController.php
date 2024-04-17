<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JurnalController extends Controller
{
    public function __construct()
    {
    }
    public function index()
    {
        return view('jurnal.index');
    }

    public function exportJurnal()
    {
    }
}
