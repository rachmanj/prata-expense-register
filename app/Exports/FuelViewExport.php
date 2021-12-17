<?php

namespace App\Exports;

use App\Models\Fuel;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class FuelViewExport implements FromView
{
    public function view(): View
    {
        $fuels = Fuel::with('aset')->get();
        return view('fuels.export', compact('fuels'));
    }
}
