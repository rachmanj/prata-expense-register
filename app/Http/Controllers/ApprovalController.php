<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    public function index()
    {
        if(auth()->user()->role === 'ADMIN') {
            $transaksis = Transaksi::with(['aset', 'transaksi_details'])
                        ->where('approval_status', '<>', 'approved')
                        ->where('approval_status', '<>', 'denied')
                        ->get();
            // return $transaksis;
            return view('approvals.index', compact('transaksis'));
        }

        if(auth()->user()->role !== 'ADMIN' && auth()->user()->approval_level !== null) {
            if (auth()->user()->approval_level === 1) {
                $transaksis = Transaksi::with(['aset', 'transaksi_details'])->where('approval_status', 'process1')->get();
            } elseif (auth()->user()->approval_level === 2) {
                $transaksis = Transaksi::with(['aset', 'transaksi_details'])->where('approval_status', 'process2')->get();
            }
            return view('approvals.index', compact('transaksis'));
        }
    }

    public function approve($transaksi_id)
    {
        $transaksi = Transaksi::find($transaksi_id);
        $approval_count = Approval::where('transaksi_id', $transaksi->id)->count();

        if ($transaksi->aset->approval_stage === 1) {
            $approval_status = 'approved';
        } elseif ($transaksi->aset->approval_stage === 2) {
            if ($approval_count > 0) {
                $approval_status = 'approved';
            } else {
                $approval_status = 'process2';
            }
        }

        $transaksi->update([
            'approval_status' =>$approval_status
        ]);

        Approval::create([
            'transaksi_id' => $transaksi->id,
            'approver_id' => auth()->user()->id,
            'level' => auth()->user()->approval_level,
        ]);

        return redirect()->route('approvals.index')->with('success', 'Transaksi successfully approved!');
    }

    public function deny($transaksi_id)
    {
        $transaksi = Transaksi::find($transaksi_id);

        $transaksi->update([
            'approval_status' => 'deny'
        ]);

        return redirect()->route('approvals.index')->with('suucess', 'Transaksi successfully deinied!');
    }
}
