<?php

namespace App\Imports;

use App\Models\Personil;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class PersonilImport implements ToCollection, WithStartRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $personil) {
            Personil::create([
                'NOTELP' => $personil[0],
                'KELOMPOKGURU' => $personil[1],
                'NAMASAJA' => $personil[2] ?? $personil[4],
                'JABATAN' => $personil[3],
                'NAMALENGKAP' => $personil[4],
                'KELAMIN' => $personil[5],
                'PANGGILAN' => $personil[6],
                'NAMADISPO' => $personil[7] ?? $personil[4],
                'PANGGILANDISPO' => $personil[8] ?? $personil[4],
                'JABATANDISPO' => $personil[9] ?? $personil[3],
                'STATUS' => $personil[10],
                'INDUKPEGAWAI' => $personil[11],
                'INDUKPEGAWAIDISPO' => $personil[12] ?? $personil[11],
                'MAPEL' => $personil[13],
                'QRCODE1' => 'https://wa.me/' . $personil[14],
                'FORWARDTO' => $personil[0],
                'EMAIL' => $personil[15]
            ]);
        }
    }

    public function startRow(): int
    {
        return 2;
    }
}
