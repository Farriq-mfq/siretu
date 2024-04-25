<?php

namespace App\Http\Controllers;

use App\DataTables\PersonilDataTable;
use App\Models\Personil;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PdfReport;
use ExcelReport;

class PersonilController extends Controller
{
    public function __construct(
        private readonly Personil $personil
    ) {

    }
    public function index(PersonilDataTable $dataTable)
    {
        // $search = $request->search;
        // $personils = $this->personil->where('NAMALENGKAP', 'LIKE', '%' . $search . '%')->whereNot('NOMOR', 0)->paginate();
        // return view('personil.index', compact('personils', 'search'));
        return $dataTable->render('personil.index');
    }

    public function create()
    {
        return view('personil.create');
    }

    public function exportPersonil(Request $request, $type)
    {
        $title = 'DATA PERSONIL';
        $meta = [
            'Di Cetak oleh' => "SMK Negeri 1 Pekalongan",
            'Tanggal' => Carbon::today()->format("Y/m/d")
        ];

        $query = $this->personil->whereNot('NOMOR', 0);
        $today = Carbon::today()->format('Y-m-d');

        $columns = [
            'NoTelp' => 'NOTELP',
            'Kelompok' => "KELOMPOKGURU",
            'Nama Lengkap' => "NAMALENGKAP",
            'Jabatan' => "JABATAN",
            'Jenis Kelamin' => "KELAMIN",
            "Status" => "STATUS",
            "No Induk" => "INDUKPEGAWAI",
            "Email" => "EMAIL"
        ];
        if ($type === 'pdf') {
            return PdfReport::of($title, $meta, $query, $columns)
                ->setOrientation('landscape')
                ->download('personil-' . $today);
        } elseif ($type === 'excel') {
            return ExcelReport::of($title, $meta, $query, $columns)
                ->download('personil-' . $today);
        } else {
            return ExcelReport::of($title, $meta, $query, $columns)
                ->download('personil-' . $today);
        }
    }
}
