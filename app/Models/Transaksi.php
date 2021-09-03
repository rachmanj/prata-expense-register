<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with = ['transaksi_details'];

    public function aset()
    {
        return $this->belongsTo(Aset::class, 'asets_id', 'id');
    }

    public function transaksi_details()
    {
        return $this->hasMany(TransaksiDetail::class, 'transaksis_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
