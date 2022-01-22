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
        return $this->belongsTo(Aset::class);
    }

    public function transaksi_details()
    {
        return $this->hasMany(TransaksiDetail::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function approvals()
    {
        return $this->hasMany(Approval::class);
    }
}
