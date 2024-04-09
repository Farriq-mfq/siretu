<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresensiGuru extends Model
{
    use HasFactory;
    protected $table = "presensi";
    protected $primaryKey = 'NoFormulir';
    protected $keyType = 'string';
    protected $cast = ['TglFormulir' => 'datetime'];
    public $timestamps = false;
}
