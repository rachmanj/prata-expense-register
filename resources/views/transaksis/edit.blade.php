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
            <h3 class="card-title">Edit Transaksi</h3>
          </div>

          <div class="card-body">
            <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">
              @csrf @method('PUT')

              <div class="row">
                <div class="col-4">
                  <div class="form-group">
                    <label>Object Maintenance</label>
                    <select name="asets_id" class="form-control select2bs4 @error('asets_id') is-invalid @enderror">
                      @foreach ($asets as $aset)
                          <option value="{{ $aset->id }}" {{ $aset->id === $transaksi->asets_id ? 'selected' : '' }}>{{ $aset->nama_aset }}</option>
                      @endforeach
                    </select>
                    @error('asets_id')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>

                <div class="col-4">
                  <div class="form-group">
                    <label>Nomor</label>
                    <input name="nomor"  value="{{ old('nomor', $transaksi->nomor) }}" class="form-control @error('nomor') is-invalid @enderror">
                    @error('nomor')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
  
                <div class="col-4">
                  <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal"  value="{{ old('tanggal', $transaksi->tanggal) }}" class="form-control @error('tanggal') is-invalid @enderror">
                    @error('tanggal')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
              </div>

              
              <div class="form-group">
                <label>Jenis Perbaikan</label>
                <input name="jenis_perbaikan"  value="{{ old('jenis_perbaikan', $transaksi->jenis_perbaikan) }}" class="form-control @error('jenis_perbaikan') is-invalid @enderror">
                @error('jenis_perbaikan')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="form-group">
                <label>Tindakan Perbaikan</label>
                <input name="tindakan_perbaikan"  value="{{ old('tindakan_perbaikan', $transaksi->tindakan_perbaikan) }}" class="form-control @error('tindakan_perbaikan') is-invalid @enderror">
                @error('tindakan_perbaikan')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-md btn-primary"><i class="fas fa-save"></i> Simpan</button>
              </div>

            </form>
          </div>
        </div>

      </div>
    </div>
@endsection

@section('styles')
    <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('scripts')
    <!-- Select2 -->
  <script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
  <script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
    }) 
  </script>
@endsection

