<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\Kategori;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsetController extends Controller
{
    public function index()
    {
        return view('asets.index');
    }

    public function create()
    {
        $kategoris = Kategori::orderBy('nama_kategori', 'asc')->get();

        return view('asets.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_aset'     => ['required', 'max:30'],
            'kategoris_id'  => ['required'],
            'keterangan'    => ''
        ]);

        $aset = new Aset();
        $aset->nama_aset = $request->nama_aset;
        $aset->kategoris_id = $request->kategoris_id;
        $aset->keterangan = $request->keterangan;
        $aset->created_by = Auth()->user()->username;
        $aset->save();

        return redirect()->route('aset.index')->with('success', 'Aset baru berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_aset'     => ['required', 'max:30'],
            'kategoris_id'  => ['required'],
            'keterangan'    => ''
        ]);

        $aset = Aset::find($id);
        $aset->nama_aset = $request->nama_aset;
        $aset->kategoris_id = $request->kategoris_id;
        $aset->keterangan = $request->keterangan;
        $aset->created_by = Auth()->user()->username;
        $aset->update();

        return redirect()->route('aset.index')->with('success', 'Aset berhasil diedit');
    }

    public function edit($id)
    {
        $aset = Aset::find($id);
        $kategoris = Kategori::orderBy('nama_kategori', 'asc')->get();

        return view('asets.edit', compact('aset', 'kategoris'));
    }

    public function destroy($id)
    {
        $aset = Aset::find($id);
        $aset->delete();

        return redirect()->route('aset.index')->with('success', 'Data Aset berhasil dilenyapkan!');

    }

    public function rekap()
    {
        return view('asets.index_rekap');
    }

    public function index_data()
    {
        $asets = Aset::with('transaksis')->orderBy('nama_aset', 'asc')->get();
        $transaksis = Transaksi::with('transaksi_details')->get();

        return datatables()->of($asets)
                ->addColumn('kategori', function ($asets) {
                    return $asets->kategori->nama_kategori;
                })
                ->addIndexColumn()
                ->addColumn('action', 'asets.action')
                ->rawColumns(['action'])
                ->toJson();
        
    }

    public function index_rekap_data()
    {
        $rekaps = DB::table('asets')
                ->join('transaksis', 'asets.id', '=', 'transaksis.asets_id')
                ->join('transaksi_details', 'transaksis.id', '=', 'transaksi_details.transaksis_id')
                ->select(
                    'asets.id',
                    'asets.nama_aset',
                    DB::raw("sum(transaksi_details.total) as expense")
                )
                ->groupBy('asets.id', 'asets.nama_aset')
                ->get();

        return datatables()->of($rekaps)
                ->editColumn('expense', function ($rekaps) {
                    return number_format($rekaps->expense, 0);
                })
                ->addIndexColumn()
                ->addColumn('action', 'asets.action_rekap')
                ->rawColumns(['action'])
                ->toJson();
        
    }
}
