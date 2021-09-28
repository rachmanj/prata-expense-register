<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_aset',
        'keterangan',
        'kategori_id',
        'created_by'
    ];
    protected $with = ['kategori'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
        // return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
        // return $this->hasMany(Transaksi::class, 'aset_id', 'id');
    }

    public function transaksiDetails()
    {
        return $this->hasManyThrough(TransaksiDetail::class, Transaksi::class);
    }
}
