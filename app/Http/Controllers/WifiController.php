<?php

namespace App\Http\Controllers;

use App\DataTables\WifiDataTable;
use Illuminate\Http\Request;

class WifiController extends Controller
{
    public function index(WifiDataTable $dataTable)
    {
        return $dataTable->render('wifi.index');
    }
}
