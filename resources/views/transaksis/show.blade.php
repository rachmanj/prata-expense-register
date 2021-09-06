@extends('templates.main')

@section('title_page')
    Transaksi
@endsection

@section('breadcrumb_title')
    transaksi
@endsection

@section('content')
<div class="row">
  <div class="col-12">

    <div class="card">
      
      <div class="card-header">

        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible">
          {{ session('success') }}
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        </div>
        @endif

        <div class="row">
          {{-- <h3 class="card-title">Invoice No. <b>{{ $invoice->inv_no }}</b> | PO No. <b>{{ $invoice->po_no ? $invoice->po_no : '' }}</b></h3> --}}
          <div class="col-6">
            <dl class="row">
              <dt class="col-sm-4">Transaksi No.</dt>
              <dd class="col-sm-8">: {{ $transaksi->nomor }}</dd>
              <dt class="col-sm-4">Tanggal</dt>
              <dd class="col-sm-8">: {{ date('d-M-Y', strtotime($transaksi->tanggal)) }}</dd>
              <dt class="col-sm-4">Object</dt>
              <dd class="col-sm-8">: {{ $transaksi->aset->nama_aset }}</dd>
              <dt class="col-sm-4">Jenis Perbaikan</dt>
              <dd class="col-sm-8">: {{ $transaksi->jenis_perbaikan }}</dd>
              <dt class="col-sm-4">Tindakan Perbaikan</dt>
              <dd class="col-sm-8">: {{ $transaksi->tindakan_perbaikan }}</dd>
            </dl>
          </div>
          <div class="col-6">
            <dl class="row">
              <dt class="col-sm-4">Pelaksana</dt>
              <dd class="col-sm-8">: {{ $transaksi->worker }}</dd>
              <dt class="col-sm-4">Diminta oleh</dt>
              <dd class="col-sm-8">: {{ $transaksi->requestor }}</dd>
              <dt class="col-sm-4">Disetujui oleh</dt>
              <dd class="col-sm-8">: {{ $transaksi->approver }}</dd>
              <dt class="col-sm-4">Dibuat oleh</dt>
              <dd class="col-sm-8">: {{ $transaksi->user->name }}</dd>
              <dt class="col-sm-4">Diinput tgl</dt>
              <dd class="col-sm-8">: {{ date('d-M-Y', strtotime($transaksi->created_at)) }}</dd>
            </dl>
          </div>
        </div>
        <hr>
        <a href="{{ route('transaksi.index') }}" class="btn btn-sm btn-success"><i class="fas fa-undo"></i> Kembali ke Daftar Transaksi</a>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Material</th>
            <th>Satuan</th>
            <th>Quantity</th>
            <th>Total (Rp)</th>
          </tr>
          </thead>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->

<div class="modal fade" id="modal-new_transaksi_detail">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Material</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('transaksi.store_detail', $transaksi->id) }}" method="POST">
        @csrf
      <div class="modal-body">
        <div class="form-group">
          <label>Nama Material</label>
          <input class="form-control" name="nama_material" value="{{ old('nama_material') }}">
        </div>
        <div class="form-group">
          <label>Satuan</label>
          <input class="form-control" name="uom" value="{{ old('uom') }}">
        </div>
        <div class="form-group">
          <label>Kuantitas</label>
          <input type="number" step=".01" class="form-control" name="qty" value="{{ old('qty') }}">
        </div>
        <div class="form-group">
          <label>Total Harga</label>
          <input type="number" step=".01" class="form-control" name="total" value="{{ old('total') }}">
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>  Save</button>
      </div>
    </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@endsection

@section('styles')
    <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('adminlte/plugins/datatables/css/datatables.min.css') }}"/>
@endsection

@section('scripts')
    <!-- DataTables  & Plugins -->
<script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables/datatables.min.js') }}"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      processing: true,
      serverSide: true,
      ajax: '{{ route('transaksi.transaksi_detail_show_data', $transaksi->id) }}',
      columns: [
        {data: 'DT_RowIndex', orderable: false, searchable: false},
        {data: 'nama_material'},
        {data: 'uom'},
        {data: 'qty'},
        {data: 'total'},
      ],
      fixedHeader: true,
      columnDefs: [
        {
          "targets": [3, 4],
          "className": "text-right"
        }
      ],
    })
  });
</script>
@endsection