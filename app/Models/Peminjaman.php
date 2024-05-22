<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjaman';
    public function getApproveAttribute()
    {
        return DB::table('approvepenge')
            ->where('NOTELP', $this->NOTELP)
            ->where('TGLIJIN', $this->TGLIJIN)
            ->first();
    }
}
