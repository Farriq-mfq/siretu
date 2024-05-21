<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $fillable = [
        'NAMALENGKAP',
        'GURUMAPEL',
        'NAMASAJA',
        'ROMBEL_MAPEL',
        'ROMBEL',
        'MAPEL',
        'NoTelp_Walas',
        'NAMA_WALAS',
        'PANGGILAN_WALAS',
        'NoTelp_BK',
        'NAMA_BK',
        'PANGGILAN_BK',
        'FORWARDTO',
    ];
}
