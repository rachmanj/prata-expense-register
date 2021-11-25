<?php

namespace App\Exports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class TransaksiExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'id',
            'tanggal',
            'nomor',
            'aset_id',
            'jenis_perbaikan',
            'tindakan_perbaikan',
            'worker',
            'requestor',
            'approver',
            'followup_by',
            'giver',
            'receiver',
            'created_by',
            'created_at',
            'updated_at'
        ];
    }

    public function collection()
    {
        return Transaksi::all();
    }
}
