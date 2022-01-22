@extends('templates.main')

@section('title_page')
    Approval Request
@endsection

@section('breadcrumb_title')
    approvals
@endsection

@section('content')
<div class="row">
  <div class="col-12">

    @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      </div>
    @endif

    @if (session()->has('danger'))
      <div class="alert alert-danger alert-dismissible">
        {{ session('danger') }}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      </div>
    @endif

    @if ($transaksis->count() < 1)
        <div class="card card-info">
          <div class="card-header">
            <div class="card-title">
              <h3>No Approval Request</h3>
            </div>
          </div>
        </div>
    @else

    @foreach ($transaksis as $transaksi)
    <div class="card card-info">
      <div class="card-header">
        <div class="card-title">Transaksi No. {{ $transaksi->nomor }} tanggal {{ date('d-M-Y', strtotime($transaksi->tanggal)) }}</div>
      </div>
      <div class="card-body">
        <dl class="row">
          <dt class="col-sm-4">Object Perbaikan</dt>
          <dd class="col-sm-8">{{ $transaksi->aset->nama_aset }}</dd>
          <dt class="col-sm-4">Alasan</dt>
          <dd class="col-sm-8">{{ $transaksi->alasan_perbaikan }}</dd>
          <dt class="col-sm-4">Jenis Perbaikan</dt>
          <dd class="col-sm-8">{{ $transaksi->jenis_perbaikan }}</dd>
          <dt class="col-sm-4">Tindakan Perbaikan</dt>
          <dd class="col-sm-8">{{ $transaksi->tindakan_perbaikan }}</dd>
          <dt class="col-sm-4">Dibuat oleh</dt>
          <dd class="col-sm-8">{{ $transaksi->creator->name }}</dd>
          <dt class="col-sm-4">Total Biaya</dt>
          <dd class="col-sm-8">Rp. {{ number_format($transaksi->transaksi_details->sum('total'), 0) }}</dd>
        </dl>
      </div>
      <div class="card-footer">
        <div class="row">
          <form action="{{ route('approvals.approve', $transaksi->id) }}" method="POST">
            @csrf @method('PUT')
            <button type="submit" class="btn btn-sm btn-success mr-3">Approve</button>
          </form>
          <div class="float-right">
            <form action="{{ route('approvals.deny', $transaksi->id) }}" method="POST">
              @csrf @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">Deny</button>
            </form>
          </div>
        </div>
      </div>
    </div> <!-- card -->
    @endforeach  

    @endif
    

    

  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
@endsection
