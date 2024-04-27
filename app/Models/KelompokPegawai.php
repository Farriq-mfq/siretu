<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelompokPegawai extends Model
{
    use HasFactory;
    protected $table = 'kelompok_pegawai';
    protected $fillable = ['kelompok'];
    public $timestamps = false;
}