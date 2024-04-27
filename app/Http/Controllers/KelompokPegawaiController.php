<?php

namespace App\Http\Controllers;

use App\DataTables\KelompokPegawaiDataTable;
use Illuminate\Http\Request;

class KelompokPegawaiController extends Controller
{
    public function index(KelompokPegawaiDataTable $dataTable)
    {
        return $dataTable->render('kelompokPegawai.index');
    }
}
