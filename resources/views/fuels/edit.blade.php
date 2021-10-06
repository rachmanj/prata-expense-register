@extends('templates.main')

@section('title_page')
    Pengisian Fuel
@endsection

@section('breadcrumb_title')
    fuel
@endsection

@section('content')
    <div class="row">
      <div class="col-12">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Ubah Data Transaksi</h3>
          </div>

          <div class="card-body">
            <form action="{{ route('fuels.update', $fuel->id) }}" method="POST">
              @csrf @method('PUT')

              <div class="row">
                <div class="col-4">
                  <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal"  value="{{ old('tanggal', $fuel->tanggal) }}" class="form-control @error('tanggal') is-invalid @enderror" autofocus>
                    @error('tanggal')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>

                <div class="col-4">
                  <div class="form-group">
                    <label>Nomor Kendaraan</label>
                    <select name="aset_id" class="form-control select2bs4 @error('aset_id') is-invalid @enderror">
                      <option value="">-- pilih kendaraan --</option>
                      @foreach ($asets as $aset)
                          <option value="{{ $aset->id }}" {{ $fuel->aset_id == $aset->id ? 'selected' : '' }}   >{{ $aset->nama_aset }}</option>
                      @endforeach
                    </select>
                    @error('aset_id')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>

                <div class="col-4">
                  <div class="form-group">
                    <label>Jenis Bahan Bakar</label>
                    <select name="fuel_type" class="form-control @error('fuel_type') is-invalid @enderror">
                      <option value="">-- pilih jenis fuel --</option>
                      <option value="SOLAR" {{ $fuel->fuel_type == 'SOLAR' ? 'selected' : '' }}>SOLAR</option>
                      <option value="BENSIN" {{ $fuel->fuel_type == 'BENSIN' ? 'selected' : '' }}>BENSIN</option>
                      <option value="OLI" {{ $fuel->fuel_type == 'OLI' ? 'selected' : '' }}>OLI</option>
                    </select>
                    @error('fuel_type')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
              </div> {{-- row --}}

              <div class="row">
                <div class="col-4">
                  <div class="form-group">
                    <label>HM</label>
                    <input type="number" name="hm"  value="{{ old('hm', $fuel->hm) }}" class="form-control @error('hm') is-invalid @enderror">
                    @error('hm')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label>KM</label>
                    <input type="number" name="km"  value="{{ old('km', $fuel->km) }}" class="form-control @error('km') is-invalid @enderror">
                    @error('km')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label>Qty</label>
                    <input type="number" name="qty"  value="{{ old('qty', $fuel->qty) }}" class="form-control @error('qty') is-invalid @enderror">
                    @error('qty')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
              </div> {{-- row --}}

              <div class="row">
                <div class="col-4">
                  <div class="form-group">
                    <label>Operator</label>
                    <input type="text" name="operator"  value="{{ old('operator', $fuel->operator) }}" class="form-control @error('operator') is-invalid @enderror">
                    @error('operator')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label>Security</label>
                    <input type="text" name="security"  value="{{ old('security', $fuel->security) }}" class="form-control @error('security') is-invalid @enderror">
                    @error('security')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label>Fuelman</label>
                    <input type="text" name="fuelman"  value="{{ old('fuelman', $fuel->fuelman) }}" class="form-control @error('fuelman') is-invalid @enderror">
                    @error('fuelman')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
              </div> {{-- row --}}

              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <label for="remarks">Catatan</label>
                    <input type="text" name="remarks" class="form-control" value="{{ old('remarks', $fuel->remarks) }}" placeholder="catatan jika ada">
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

