<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    use HasFactory;
    protected $table = 'jurnal';
    protected $primaryKey = 'NoFormulir';
    protected $keyType = 'string';
    protected $cast = ['TglFormulir' => 'datetime'];
    public $timestamps = false;
}
