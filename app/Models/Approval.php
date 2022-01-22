<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }

    public function approver1()
    {
        return $this->belongsTo(User::class, 'approver1_id', 'id');
    }

    public function approver2()
    {
        return $this->belongsTo(User::class, 'approver2_id', 'id');
    }
}
