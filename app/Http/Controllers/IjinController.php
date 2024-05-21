<?php

namespace App\Http\Controllers;
use App\DataTables\IjinGuruDataTable;


class IjinController extends Controller
{
    public function ijin_guru(IjinGuruDataTable $datatable)
    {
        return $datatable->render('perijinan.guru.index');
    }
}
