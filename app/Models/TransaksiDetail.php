<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'transaksis_id', 'id');
    }
}