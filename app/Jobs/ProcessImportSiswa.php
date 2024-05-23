<?php

namespace App\Jobs;

use App\Models\Personil;
use App\Models\Siswa;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Rap2hpoutre\FastExcel\Facades\FastExcel;

class ProcessImportSiswa implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, Batchable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private readonly string $pathName,
    ) {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $collection = (new FastExcel)->import($this->pathName);
        foreach ($collection as $siswa) {
            $walas = Personil::where('NOTELP', $siswa['NoTelp_Walas'])->first();
            $bk = Personil::where('NOTELP', $siswa['NoTelp_BK'])->first();
            Siswa::create([
                'NOTELP' => $siswa["NOTELP"],
                'NAMA' => strtoupper($siswa["NAMA"]),
                'NOINDUK' => $siswa["NOINDUK"],
                'NISN' => $siswa["NISN"],
                'JK' => $siswa["JK"],
                'AGAMA' => $siswa["Agama"],
                'ROMBEL' => $siswa["ROMBEL"],
                'NoTelp_Walas' => $walas ? $walas['NOTELP'] : NULL,
                'NAMA_WALAS' => $walas ? $walas['NAMALENGKAP'] : NULL,
                'PANGGILAN_WALAS' => $walas ? $walas['PANGGILAN'] : NULL,
                'NoTelp_BK' => $bk ? $bk['NOTELP'] : NULL,
                'NAMA_BK' => $bk ? $bk['NAMALENGKAP'] : NULL,
                'PANGGILAN_BK' => $bk ? $bk['PANGGILAN'] : NULL,
                'FORWARDTO' => $walas && $bk ? $walas['NOTELP'] . ';' . $bk['NOTELP'] : NULL
            ]);
        }
    }
}
