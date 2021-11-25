<?php

namespace App\Exports;

use App\Models\Fuel;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class FuelExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            '#',
            'tanggal',
            'fuel_type',
            'aset_id',
            'hm',
            'km',
            'qty',
            'remarks',
            'operator',
            'security',
            'fuelman',
            'created_by',
            'created_at',
            'updated_at'
        ];
    }

    public function collection()
    {
        return Fuel::all();
    }

    // public function fuel_export()
    // {
    //     $fuels = Fuel::with('aset')->get();


    // }
}
