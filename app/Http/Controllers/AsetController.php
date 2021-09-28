<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\Kategori;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
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
            'kategori_id'  => ['required'],
            'keterangan'    => ''
        ]);

        $aset = new Aset();
        $aset->nama_aset = $request->nama_aset;
        $aset->kategori_id = $request->kategori_id;
        $aset->keterangan = $request->keterangan;
        $aset->created_by = Auth()->user()->username;
        $aset->save();

        return redirect()->route('aset.index')->with('success', 'Aset baru berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_aset'     => ['required', 'max:30'],
            'kategori_id'  => ['required'],
            'keterangan'    => ''
        ]);

        $aset = Aset::find($id);
        $aset->nama_aset = $request->nama_aset;
        $aset->kategori_id = $request->kategori_id;
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

    public function show($id)
    {
        $aset = Aset::find($id);

        return view('asets.show', compact('aset'));
    }

    public function index_data()
    {
        $asets = Aset::with('transaksiDetails')->orderBy('nama_aset', 'asc')->get();

        return datatables()->of($asets)
                ->addColumn('kategori', function ($asets) {
                    return $asets->kategori->nama_kategori;
                })
                ->addColumn('expense', function ($asets) {
                    if ($asets->transaksiDetails) {
                        return number_format($asets->transaksiDetails->sum('total'), 0);
                    } else {
                        return '-';
                    }
                })
                ->addIndexColumn()
                ->addColumn('action', 'asets.action')
                ->rawColumns(['action'])
                ->toJson();
        
    }

    public function transaksi_data($id)
    {
        $transaksis = Transaksi::where('aset_id', $id)
                      ->orderBy('tanggal', 'desc')
                      ->get();

        return datatables()->of($transaksis)
                    ->addColumn('amount', function ($transaksis) {
                        if ($transaksis->transaksi_details) {
                            return number_format($transaksis->transaksi_details->sum('total'), 0);
                        } else {
                            return '-';
                        }
                    })
                    ->editColumn('tanggal', function($transaksis) {
                        return date('d-M-Y', strtotime($transaksis->tanggal));
                    })
                    ->addIndexColumn()
                    ->addColumn('action', 'asets.show_action')
                    ->rawColumns(['action'])
                    ->toJson();

    }

    public function show_trans_detail($id)
    {
        $transaksi = Transaksi::with('aset')->find($id);

        return view('asets.show_trans_details', compact('transaksi'));
    }

    public function show_detail_data($id)
    {
        $details = TransaksiDetail::where('transaksi_id', $id)->get();

        return datatables()->of($details)
                ->editColumn('total', function ($details) {
                    return number_format($details->total, 0);
                })
                ->addIndexColumn()
                ->toJson();
    }

}
