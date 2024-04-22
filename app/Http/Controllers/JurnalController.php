<?php

namespace App\Http\Controllers;

use App\DataTables\JurnalDataTable;
use Illuminate\Http\Request;

class JurnalController extends Controller
{
    public function __construct()
    {
    }
    public function index(JurnalDataTable $dataTable)
    {
        return $dataTable->render('jurnal.index');
    }

    public function exportJurnal()
    {
    }
}
