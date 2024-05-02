<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $fillable = ["nama", "nipd", "jenis_kelamin", "nisn", "tempat_lahir", "tanggal_lahir", "nik", "agama", "alamat", "rt", "rw", "dusun", "kelurahan", "kecamatan", "kode_pos", "jenis_tinggal", "alat_transportasi", "telepon", "notelp", "email", "SKHUN", "penerima_kps", "no_kps", "rombel", "NAMA_WALAS", "PANGGILAN_WALAS", "NAMA_BK", "PANGGILAN_BK", "FORWARDTO"];
}
