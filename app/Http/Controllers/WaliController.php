<?php

namespace App\Http\Controllers;

use App\DataTables\WaliDataTable;
use Illuminate\Http\Request;

class WaliController extends Controller
{
    public function index(WaliDataTable $datatable)
    {
        return $datatable->render('wali.index');
    }
}
