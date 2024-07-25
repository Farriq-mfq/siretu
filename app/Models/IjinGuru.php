<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class IjinGuru extends Model
{
    use HasFactory;
    protected $table = 'ijinguru';
    // protected $table = 'oramlebu';
    public $timesTamps = false;
    public function getApproveAttribute()
    {
        return DB::table('approveijinguru')
            ->where('NOTELP', $this->NOTELP)
            ->where('TGLIJIN', $this->TGLIJIN)
            ->first();
    }
}
