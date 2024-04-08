<?php

namespace App\Http\Controllers;

use App\Models\PresensiTu;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PdfReport;
use ExcelReport;

class ReportPresencesController extends Controller
{
    public function __construct(
        private readonly PresensiTu $presensiTu
    ) {

    }
    public function presensi_tu(Request $request)
    {
        $today = Carbon::now()->format('Y-m-d');
        $show = $request->show ?? "current";
        $tab = $request->tab ?? 'Data';
        $filter = [
            'show' => $show,
            'first_date' => $request->first_date,
            'last_date' => $request->last_date,
            'search' => $request->search
        ];

        if ($filter['first_date'] && $filter['last_date']) {
            if (Carbon::parse($request->first_date)->greaterThan(Carbon::parse($request->last_date))) {
                to_route('presensi-tu')->with('message', [
                    'message' => "Tanggal awal harus lebih kecil dari tanggal akhir",
                    'type' => 'error'
                ]);
            }
        }

        if ($show === 'current') {
            $query = $this->presensiTu->whereNot('NoFormulir', '-')->whereRaw("DATE_FORMAT(STR_TO_DATE(TglFormulir, '%d-%m-%Y %H:%i'), '%Y-%m-%d') = ?", [$today])->orderBy('NoFormulir', 'ASC');
        } else if ($show === 'all') {
            if ($filter['first_date'] && $filter['last_date'] && !(Carbon::parse($request->first_date)->greaterThan(Carbon::parse($request->last_date)))) {
                $query = $this->presensiTu->whereNot('NoFormulir', '-')->whereRaw("DATE_FORMAT(STR_TO_DATE(TglFormulir, '%d-%m-%Y %H:%i'), '%Y-%m-%d') >= ?", $filter['first_date'])->whereRaw("DATE_FORMAT(STR_TO_DATE(TglFormulir, '%d-%m-%Y %H:%i'), '%Y-%m-%d') <= ?", $filter['last_date'])->orderBy('NoFormulir', 'ASC');
            } else {
                $query = $this->presensiTu->whereNot('NoFormulir', '-')->orderBy('NoFormulir', 'ASC');
            }
        } else if ($show === 'completed') {
            if ($filter['first_date'] && $filter['last_date'] && !(Carbon::parse($request->first_date)->greaterThan(Carbon::parse($request->last_date)))) {
                $query = $this->presensiTu->whereNot('NoFormulir', '-')->whereRaw("DATE_FORMAT(STR_TO_DATE(TglFormulir, '%d-%m-%Y %H:%i'), '%Y-%m-%d') >= ?", $filter['first_date'])->whereRaw("DATE_FORMAT(STR_TO_DATE(TglFormulir, '%d-%m-%Y %H:%i'), '%Y-%m-%d') <= ?", $filter['last_date'])->orderBy('NoFormulir', 'ASC')->whereNotNull('DATANG')->whereNotNull('PULANG');
            } else {
                $query = $this->presensiTu->whereNot('NoFormulir', '-')->orderBy('NoFormulir', 'ASC')->whereNotNull('DATANG')->whereNotNull('PULANG');
            }
        } else if ($show === 'uncompleted') {
            if ($filter['first_date'] && $filter['last_date'] && !(Carbon::parse($request->first_date)->greaterThan(Carbon::parse($request->last_date)))) {
                $query = $this->presensiTu->whereNot('NoFormulir', '-')->whereRaw("DATE_FORMAT(STR_TO_DATE(TglFormulir, '%d-%m-%Y %H:%i'), '%Y-%m-%d') >= ?", $filter['first_date'])->whereRaw("DATE_FORMAT(STR_TO_DATE(TglFormulir, '%d-%m-%Y %H:%i'), '%Y-%m-%d') <= ?", $filter['last_date'])->orderBy('NoFormulir', 'ASC')->whereNull('DATANG')->orWhereNull('PULANG');
            } else {
                $query = $this->presensiTu->whereNot('NoFormulir', '-')->orderBy('NoFormulir', 'ASC')->whereNull('DATANG')->orWhereNull('PULANG');
            }
        } else {
            $query = $this->presensiTu->whereNot('NoFormulir', '-')->whereRaw("DATE_FORMAT(STR_TO_DATE(TglFormulir, '%d-%m-%Y %H:%i'), '%Y-%m-%d') = ?", [$today])->orderBy('NoFormulir', 'ASC');
        }

        if ($filter['search']) {
            $presences = $query
                ->where('NAMALENGKAP', 'LIKE', '%' . $filter['search'] . '%')
                ->paginate()->appends($filter);
        } else {
            $presences = $query->paginate()->appends($filter);
        }
        $presences_count = [
            'lengkap' => $show === 'uncompleted' ? 0 : $query->whereNotNull('DATANG')->whereNotNull('PULANG')->count(),
            'belum_lengkap' => $show === 'completed' ? 0 : $query->whereNull('DATANG')->orWhereNull('PULANG')->count()
        ];

        return view('presensi.tu.index', compact('presences', 'show', 'filter', 'presences_count', 'tab'));
    }
    public function presensi_guru()
    {

        return view('presensi.guru.index');
    }

    public function exportPresensiTU(Request $request, $type)
    {
        $today = Carbon::now()->format('Y-m-d');
        $show = $request->show ?? "current";
        $filter = [
            'show' => $show,
            'first_date' => $request->first_date,
            'last_date' => $request->last_date,
            'search' => $request->search
        ];

        if ($filter['first_date'] && $filter['last_date']) {
            if (Carbon::parse($request->first_date)->greaterThan(Carbon::parse($request->last_date))) {
                to_route('presensi-tu')->with('message', [
                    'message' => "Tanggal awal harus lebih kecil dari tanggal akhir",
                    'type' => 'error'
                ]);
            }
        }

        if ($show === 'current') {
            $query = $this->presensiTu->whereNot('NoFormulir', '-')->whereRaw("DATE_FORMAT(STR_TO_DATE(TglFormulir, '%d-%m-%Y %H:%i'), '%Y-%m-%d') = ?", [$today])->orderBy('NoFormulir', 'ASC');
        } else if ($show === 'all') {
            if ($filter['first_date'] && $filter['last_date'] && !(Carbon::parse($request->first_date)->greaterThan(Carbon::parse($request->last_date)))) {
                $query = $this->presensiTu->whereNot('NoFormulir', '-')->whereRaw("DATE_FORMAT(STR_TO_DATE(TglFormulir, '%d-%m-%Y %H:%i'), '%Y-%m-%d') >= ?", $filter['first_date'])->whereRaw("DATE_FORMAT(STR_TO_DATE(TglFormulir, '%d-%m-%Y %H:%i'), '%Y-%m-%d') <= ?", $filter['last_date'])->orderBy('NoFormulir', 'ASC');
            } else {
                $query = $this->presensiTu->whereNot('NoFormulir', '-')->orderBy('NoFormulir', 'ASC');
            }
        } else if ($show === 'completed') {
            if ($filter['first_date'] && $filter['last_date'] && !(Carbon::parse($request->first_date)->greaterThan(Carbon::parse($request->last_date)))) {
                $query = $this->presensiTu->whereNot('NoFormulir', '-')->whereRaw("DATE_FORMAT(STR_TO_DATE(TglFormulir, '%d-%m-%Y %H:%i'), '%Y-%m-%d') >= ?", $filter['first_date'])->whereRaw("DATE_FORMAT(STR_TO_DATE(TglFormulir, '%d-%m-%Y %H:%i'), '%Y-%m-%d') <= ?", $filter['last_date'])->orderBy('NoFormulir', 'ASC')->whereNotNull('DATANG')->whereNotNull('PULANG');
            } else {
                $query = $this->presensiTu->whereNot('NoFormulir', '-')->orderBy('NoFormulir', 'ASC')->whereNotNull('DATANG')->whereNotNull('PULANG');
            }
        } else if ($show === 'uncompleted') {
            if ($filter['first_date'] && $filter['last_date'] && !(Carbon::parse($request->first_date)->greaterThan(Carbon::parse($request->last_date)))) {
                $query = $this->presensiTu->whereNot('NoFormulir', '-')->whereRaw("DATE_FORMAT(STR_TO_DATE(TglFormulir, '%d-%m-%Y %H:%i'), '%Y-%m-%d') >= ?", $filter['first_date'])->whereRaw("DATE_FORMAT(STR_TO_DATE(TglFormulir, '%d-%m-%Y %H:%i'), '%Y-%m-%d') <= ?", $filter['last_date'])->orderBy('NoFormulir', 'ASC')->whereNull('DATANG')->orWhereNull('PULANG');
            } else {
                $query = $this->presensiTu->whereNot('NoFormulir', '-')->orderBy('NoFormulir', 'ASC')->whereNull('DATANG')->orWhereNull('PULANG');
            }
        } else {
            $query = $this->presensiTu->whereNot('NoFormulir', '-')->whereRaw("DATE_FORMAT(STR_TO_DATE(TglFormulir, '%d-%m-%Y %H:%i'), '%Y-%m-%d') = ?", [$today])->orderBy('NoFormulir', 'ASC');
        }
        $title = 'DATA PRESENSI TU';
        $meta = [
            'Di Cetak oleh' => "SMK Negeri 1 Pekalongan",
            'Tanggal' => Carbon::today()->format("Y/m/d")
        ];

        $columns = [
            'Status' => function ($presence) {
                return ($presence->DATANG && $presence->PULANG) ? 'Lengkap' : 'Belum Lengkap';
            },
            'NoFormulir' => 'NoFormulir',
            'Tanggal Formulir' => "TglFormulir",
            'Nama Lengkap' => "NAMALENGKAP",
            'No Telp' => "NoTelp",
            'Kondisi' => "KONDISI",
            'Jarak Datang' => "JARAK_DATANG",
            'Jam Datang' => "JAM_DATANG",
            "Jarak Pulang" => "JARAK_PULANG",
            "Jam Pulang" => "JAM_PULANG",
            "Aktifitas yang di lakukan" => "AKTIFITAS"
        ];

        if ($type === 'pdf') {
            return PdfReport::of($title, $meta, $query, $columns)
                ->setOrientation('landscape')
                ->download('presensi-tu-' . $today);
        } elseif ($type === 'excel') {
            return ExcelReport::of($title, $meta, $query, $columns)
                ->download('presensi-tu-' . $today);
        } else {
            return ExcelReport::of($title, $meta, $query, $columns)
                ->download('presensi-tu-' . $today);
        }

    }

    public function resetPresensiTu(string $id)
    {
        $deleted = $this->presensiTu->where('NoFormulir', $id)->delete();
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
