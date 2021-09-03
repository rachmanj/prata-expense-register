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
        'kategoris_id',
        'created_by'
    ];
    protected $with = ['kategori'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategoris_id', 'id');
    }

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class, 'asets_id', 'id');
    }
}
