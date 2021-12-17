<?php

namespace App\Http\Controllers;

use App\Exports\FuelViewExport;
use App\Http\Requests\StoreFuelRequest;
use App\Models\Aset;
use App\Models\Fuel;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class FuelController extends Controller
{
    public function index()
    {
        return view('fuels.index');
    }

    public function create()
    {
        $asets = Aset::orderBy('nama_aset', 'asc')->get();

        return view('fuels.create', compact('asets'));
    }

    public function store(StoreFuelRequest $request)
    {
        Fuel::create(array_merge($request->validated(), [
            'hm' => $request->hm,
            'remarks' => $request->remarks,
            'operator' => $request->operator,
            'security' => $request->security,
            'fuelman' => $request->fuelman,
            'created_by' => auth()->id(),
        ]));

        return redirect()->route('fuels.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(Fuel $fuel)
    {
        return view('fuels.show', compact('fuel'));
    }

    public function edit(Fuel $fuel)
    {
        $asets = Aset::orderBy('nama_aset', 'asc')->get();

        return view('fuels.edit', compact('fuel', 'asets'));
    }

    public function update(StoreFuelRequest $request, Fuel $fuel)
    {
        $fuel->update(array_merge($request->validated(), [
            'hm' => $request->hm,
            'remarks' => $request->remarks,
            'operator' => $request->operator,
            'security' => $request->security,
            'fuelman' => $request->fuelman,
            'created_by' => auth()->id(),
        ]));

        return redirect()->route('fuels.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy(Fuel $fuel)
    {
        $fuel->delete();
        return redirect()->route('fuels.index')->with('success', 'Data berhasil dihapus');
    }

    public function fuels_show_rekap()
    {
        return view('fuels.rekap');
    }

    public function fuels_index_data()
    {
        $fuels = Fuel::with('aset')->orderBy('tanggal', 'desc')->get();

        return datatables()->of($fuels)
            ->editColumn('tanggal', function($fuels) {
                return date('d-M-Y', strtotime($fuels->tanggal));
            })
            ->addColumn('aset', function ($fuels) {
                return $fuels->aset->nama_aset;
            })
            ->addIndexColumn()
            ->addColumn('action', 'fuels.action')
            ->rawColumns(['action'])
            ->toJson();
    }

    public function fuels_rekap_data()
    {
        $asets = Aset::without('kategori')->whereHas('fuels')
                ->with('fuels')
                ->orderBy('nama_aset', 'asc')
                ->get();

        return datatables()->of($asets)
            ->addColumn('total', function ($asets) {
                return number_format($asets->fuels->sum('qty'), 0);
            })
            ->addIndexColumn()
            ->toJson();
    }

    public function fuels_export_excel()
    {
        // return Excel::download(new FuelExport(), 'fuels_export.xlsx');
        return Excel::download(new FuelViewExport(), 'fuels_export.xlsx');
    }
}
