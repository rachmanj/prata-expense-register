<?php

namespace App\Exports;

use App\Models\Transaksi;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TransaksiViewExport implements FromView
{
    public function view(): View
    {
        $transaksis = Transaksi::with(['aset', 'transaksi_details'])->get();
        return view('transaksis.export', compact('transaksis'));
    }
}
