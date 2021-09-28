@extends('templates.main')

@section('title_page')
    Aset
@endsection

@section('breadcrumb_title')
    aset
@endsection

@section('content')
    <div class="row">
      <div class="col-12">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Aset Baru</h3>
          </div>

          <div class="card-body">
            <form action="{{ route('aset.store') }}" method="POST">
              @csrf

              <div class="form-group">
                <label>Nama Aset</label>
                <input name="nama_aset"  value="{{ old('nama_aset') }}" class="form-control @error('nama_aset') is-invalid @enderror">
                @error('nama_aset')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="form-group">
                <label>Kategori</label>
                <select name="kategori_id" class="form-control select2bs4">
                  <option value="">-- pilih lah --</option>
                  @foreach ($kategoris as $kategori)
                      <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label>Keterangan</label>
                <input name="keterangan"  value="{{ old('keterangan') }}" class="form-control @error('keterangan') is-invalid @enderror">
                @error('keterangan')
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

