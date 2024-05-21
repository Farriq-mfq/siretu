<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SesiPesan extends Model
{
    use HasFactory;
    protected $table = 'sesipesan';

    public $timestamps = false;
}
