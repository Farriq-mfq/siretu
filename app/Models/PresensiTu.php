<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresensiTu extends Model
{
    use HasFactory;
    protected $table = "presensi_tu";
    protected $primaryKey = 'NoFormulir';
    protected $keyType = 'string';
    protected $cast = ['TglFormulir' => 'datetime'];
    public $timestamps = false;
}
