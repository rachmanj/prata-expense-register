@extends('templates.main')

@section('title_page')
    Kategori
@endsection

@section('breadcrumb_title')
    kategori
@endsection

@section('content')
    <div class="row">
      <div class="col-12">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Edit Kategori</h3>
          </div>

          <div class="card-body">
            <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
              @csrf @method('PUT')

              <div class="form-group">
                <label>Nama Kategori</label>
                <input name="nama_kategori"  value="{{ old('nama_kategori', $kategori->nama_kategori) }}" class="form-control @error('nama_kategori') is-invalid @enderror">
                @error('nama_kategori')
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

