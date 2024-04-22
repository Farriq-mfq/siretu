<?php

namespace App\Http\Controllers;

use App\DataTables\PresensiGuruDataTable;
use App\DataTables\PresensiTuDataTable;
use App\Models\Personil;
use App\Models\PresensiGuru;
use App\Models\PresensiTu;

class ReportPresencesController extends Controller
{
    public function __construct(
        private readonly PresensiTu $presensiTu,
        private readonly PresensiGuru $presensiGuru,
        private readonly Personil $personil
    ) {

    }
    // public function presensi_tu(Request $request)
    public function presensi_tu(PresensiTuDataTable $dataTable)
    {
        $showAvailable = ['all', 'current', 'filter'];
        $by = request('show') ? in_array(request('show'), $showAvailable) ? request('show') : 'current' : "current";
        $filter = request('show') === 'filter' ? [
            'start_date' => request('start_date'),
            'end_date' => request('end_date'),
            'personil' => request('personil'),
        ] : [];
        $personil = $this->personil->whereNot('NOMOR', 0)->get();
        return $dataTable->render('presensi.tu.index', compact('by', 'filter', 'personil'));

    }

    public function resetPresensiTu(string $id, string $tgl)
    {
        $deleted = $this->presensiTu->where('NoFormulir', $id)->where("TglFormulir", $tgl)->delete();
        if ($deleted) {
            return back()->with('message', [
                'message' => "Berhasil reset presensi",
                'type' => 'success'
            ]);
        } else {
            return back()->with('message', [
                'message' => "Gagal reset presensi",
                'type' => 'error'
            ]);
        }
    }

    // public function presensi_guru(Request $request)
    public function presensi_guru(PresensiGuruDataTable $dataTable)
    {
        $showAvailable = ['all', 'current', 'filter'];
        $by = request('show') ? in_array(request('show'), $showAvailable) ? request('show') : 'current' : "current";
        $filter = request('show') === 'filter' ? [
            'start_date' => request('start_date'),
            'end_date' => request('end_date'),
            'personil' => request('personil'),
        ] : [];
        $personil = $this->personil->whereNot('NOMOR', 0)->get();
        return $dataTable->render('presensi.guru.index', compact('by', 'filter', 'personil'));
    }

    public function resetPresensiGuru(string $id, string $tgl)
    {
        $deleted = $this->presensiGuru->where('NoFormulir', $id)->where('TglFormulir', $tgl)->delete();
        if ($deleted) {
            return back()->with('message', [
                'message' => "Berhasil reset presensi",
                'type' => 'success'
            ]);
        } else {
            return back()->with('message', [
                'message' => "Gagal reset presensi",
                'type' => 'error'
            ]);
        }
    }
}
