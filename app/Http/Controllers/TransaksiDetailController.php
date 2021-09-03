<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransaksiDetailController extends Controller
{
    public function index()
    {
        return view('transaksi_details.index');
    }
}
