<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutBox extends Model
{
    use HasFactory;
    protected $table = 'outbox';
    protected $fillable = ['notelp', 'pesan'];

    public $timestamps = false;
}
