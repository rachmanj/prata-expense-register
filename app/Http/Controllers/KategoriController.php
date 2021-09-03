<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        return view('kategoris.index');
    }

    public function create()
    {
        return view('kategoris.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_kategori' => ['required','max:50']
        ]);

        $kategori = new Kategori();
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->created_by = Auth()->user()->username;
        $kategori->save();

        return redirect()->route('kategori.index')->with('success', 'Kategori baru berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kategori = Kategori::find($id);

        return view('kategoris.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_kategori' => ['required', 'max:50']
        ]);

        $kategori = Kategori::find($id);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->update();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diupdate');
    }

    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus');
    }

    public function index_data()
    {
        $kategoris = Kategori::latest()->get();

        return datatables()->of($kategoris)
                ->addIndexColumn()
                ->addColumn('action', 'kategoris.action')
                ->rawColumns(['action'])
                ->toJson();
        
    }
}
