@extends('templates.main')

@section('title_page')
    Transaksi <small>(pending)</small>
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

        @if (session()->has('danger'))
        <div class="alert alert-danger alert-dismissible">
          {{ session('danger') }}
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        </div>
        @endif

        <a href="{{ route('transaksi.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Tambah Transaksi</a>
        {{-- <a href="{{ route('transaksi.export_excel') }}" class="btn btn-sm btn-success"><i class="fas fa-file-export"></i> Export Excel</a> --}}
        <a href="#" class="float-right"> <b>Pendings</b></a>
        <a href="{{ route('transaksi.index') }}" class="float-right mr-4"> Approveds</a>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Nomor</th>
            <th>Tanggal</th>
            <th>Object</th>
            <th>Jenis Perbaikan</th>
            <th>Total</th>
            <th>Status</th>
            <th></th>
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
      ajax: '{{ route('transaksi.index_pending.data') }}',
      columns: [
        {data: 'DT_RowIndex', orderable: false, searchable: false},
        {data: 'nomor'},
        {data: 'tanggal'},
        {data: 'aset'},
        {data: 'jenis_perbaikan'},
        {data: 'total'},
        {data: 'approval_status'},
        {data: 'action', orderable: false, searchable: false},
      ],
      fixedHeader: true,
      columnDefs: [
        {
          "targets": 5,
          "className": "text-right"
        }
      ],
    })
  });
</script>
@endsection
