<?php

namespace App\Http\Controllers;

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
    public function index(Request $request)
    {
        $search = $request->search;
        $personils = $this->personil->where('NAMALENGKAP', 'LIKE', '%' . $search . '%')->whereNot('NOMOR', 0)->paginate();
        return view('personil.index', compact('personils', 'search'));
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
            'NoTelp' => 'NoTelp',
            'Kelompok' => "KELOMPOKGURU",
            'Nama Saja' => "NAMASAJA",
            'Jabatan' => "JABATAN",
            'Nama Lengkap' => "NAMALENGKAP",
            'Jenis Kelamin' => "KELAMIN",
            'Panggilan' => "PANGGILAN",
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
