<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        return view('transaksis.index');
    }

    public function create()
    {
        $asets = Aset::orderBy('nama_aset', 'asc')->get();

        return view('transaksis.create', compact('asets'));
    }

    public function store(Request $request)
    {
        $data_tosave = $this->validate($request, [
            'nomor'                     => ['required', 'unique:transaksis'],
            'tanggal'                   => ['required'],
            'asets_id'                  => ['required'],
            'jenis_perbaikan'           => ['required'],
            'tindakan_perbaikan'        => ['required'],
        ]);

        $transaksi = Transaksi::create(array_merge($data_tosave, [
            'users_id'  => Auth()->user()->id
        ]));

        $transaksi_id = $transaksi->id;

        return redirect()->route('transaksi.create_detail', $transaksi_id);
    }

    public function create_detail($transaksi_id)
    {
        $transaksi = Transaksi::find($transaksi_id);

        return view('transaksis.transaksi_details.create', compact('transaksi'));
    }

    public function store_detail(Request $request, $transaksi_id)
    {
        $transaksi_detail = new TransaksiDetail();

        $transaksi_detail->transaksis_id = $transaksi_id;
        $transaksi_detail->nama_material = $request->nama_material;
        $transaksi_detail->uom = $request->uom;
        $transaksi_detail->qty = $request->qty;
        $transaksi_detail->total = $request->total;
        $transaksi_detail->save();

        return redirect()->route('transaksi.create_detail', $transaksi_id);
    }

    public function transaksi_index_data()
    {
        $transaksis = Transaksi::with('transaksi_details')->orderBy('tanggal', 'desc')->get();

        return datatables()->of($transaksis)
            ->addColumn('aset', function ($transaksis) {
                return $transaksis->aset->nama_aset;
            })
            ->addColumn('total', function ($transaksis) {
                return number_format($transaksis->transaksi_details->sum('total'), 0);
            })
            ->editColumn('tanggal', function($transaksis) {
                return date('d-M-Y', strtotime($transaksis->tanggal));
            })
            ->addIndexColumn()
            ->addColumn('action', 'asets.action')
            ->rawColumns(['action'])
            ->toJson();
    }

    public function transaksi_detail_index_data($transaksi_id)
    {
        $transaksi_details = TransaksiDetail::where('transaksis_id', $transaksi_id)->get();

        return datatables()->of($transaksi_details)
            ->editColumn('total', function ($transaksi_details) {
                return number_format($transaksi_details->total, 0);
            })
            ->addIndexColumn()
            ->addColumn('action', 'asets.action')
            ->rawColumns(['action'])
            ->toJson();
    }
}
