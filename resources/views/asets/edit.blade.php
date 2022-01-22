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
            <h3 class="card-title">Edit Aset</h3>
            <a href="{{ route('aset.index') }}" class="btn btn-sm btn-success float-right"><i class="fas fa-undo"></i> Back</a>
          </div>

          <div class="card-body">
            <form action="{{ route('aset.update', $aset->id) }}" method="POST">
              @csrf @method('PUT')

              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <label>Nama Aset</label>
                    <input name="nama_aset"  value="{{ old('nama_aset', $aset->nama_aset) }}" class="form-control @error('nama_aset') is-invalid @enderror">
                    @error('nama_aset')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label>Kategori</label>
                    <select name="kategori_id" class="form-control select2bs4">
                      @foreach ($kategoris as $kategori)
                          <option value="{{ $kategori->id }}" {{ $kategori->id === $aset->kategoris_id ? 'selected' : '' }}>{{ $kategori->nama_kategori }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label>Approval Stage</label>
                    <select name="approval_stage" class="form-control">
                      <option value="0" {{ $aset->approval_stage == 0 ? 'selected' : '' }}>No Approval</option>
                      <option value="1" {{ $aset->approval_stage == 1 ? 'selected' : '' }}>1 Level</option>
                      <option value="2" {{ $aset->approval_stage == 2 ? 'selected' : '' }}>2 Level</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <label>Keterangan</label>
                    <input name="keterangan"  value="{{ old('keterangan', $aset->keterangan) }}" class="form-control @error('keterangan') is-invalid @enderror">
                    @error('keterangan')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
              </div>

          </div>
          <div class="card-footer">
            <div class="form-group">
              <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Simpan</button>
            </div>
          </div>
        </form>
        </div>

      </div>
    </div>
@endsection

