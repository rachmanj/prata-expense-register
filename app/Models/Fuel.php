<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fuel extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'fuel_type', // solar/bensin/oli
        'aset_id',
        'hm',
        'km',
        'qty',
        'remarks',
        'operator',
        'security',
        'fuelman',
        'created_by',
    ];

    public function aset()
    {
        return $this->belongsTo(Aset::class);
    }
}
