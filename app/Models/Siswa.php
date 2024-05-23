<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = ["NAMA", "NOTELP", "NOINDUK", "NISN", "JK", "AGAMA", "ROMBEL", "NoTelp_Walas", "NAMA_WALAS", "PANGGILAN_WALAS", "NoTelp_BK", "NAMA_BK", "PANGGILAN_BK", "FORWARDTO"];
}
