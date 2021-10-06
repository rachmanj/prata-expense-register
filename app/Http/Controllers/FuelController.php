<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFuelRequest;
use App\Models\Aset;
use App\Models\Fuel;
use Illuminate\Http\Request;

class FuelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('fuels.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asets = Aset::orderBy('nama_aset', 'asc')->get();

        return view('fuels.create', compact('asets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fuel  $fuel
     * @return \Illuminate\Http\Response
     */
    public function show(Fuel $fuel)
    {
        return view('fuels.show', compact('fuel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fuel  $fuel
     * @return \Illuminate\Http\Response
     */
    public function edit(Fuel $fuel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fuel  $fuel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fuel $fuel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fuel  $fuel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fuel $fuel)
    {
        //
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
}
