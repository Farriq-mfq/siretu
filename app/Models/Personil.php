<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personil extends Model
{
    use HasFactory;
    protected $fillable = ['NOTELP', 'KELOMPOKGURU', 'NAMASAJA', 'JABATAN', 'NAMALENGKAP', 'KELAMIN', 'PANGGILAN', 'NAMADISPO', 'PANGGILANDISPO', 'JABATANDISPO', 'STATUS', 'INDUKPEGAWAI', 'INDUKPEGAWAIDISPO', 'MAPEL', 'QRCODE', 'FORWARDTO', 'EMAIL'];
}
