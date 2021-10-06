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
            <h3 class="card-title">Transaksi Baru</h3>
          </div>

          <div class="card-body">
            <form>

              <div class="row">
                <div class="col-4">
                  <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date"value="{{ $fuel->tanggal }}" class="form-control" readonly>
                  </div>
                </div>

                <div class="col-4">
                  <div class="form-group">
                    <label>Kendaraan</label>
                    <input type="text" value="{{ $fuel->aset->nama_aset }}" class="form-control" readonly>
                  </div>
                </div>

                <div class="col-4">
                  <div class="form-group">
                    <label>Jenis Bahan Bakar</label>
                    <input type="text" value="{{ $fuel->fuel_type }}" class="form-control" readonly>
                  </div>
                </div>
              </div> {{-- row --}}

              <div class="row">
                <div class="col-4">
                  <div class="form-group">
                    <label>HM</label>
                    <input type="text" value="{{ $fuel->hm }}" class="form-control" readonly>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label>KM</label>
                    <input type="text" value="{{ $fuel->km }}" class="form-control" readonly>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label>Qty</label>
                    <input type="text" value="{{ $fuel->qty }}" class="form-control" readonly>
                  </div>
                </div>
              </div> {{-- row --}}

              <div class="row">
                <div class="col-4">
                  <div class="form-group">
                    <label>Operator</label>
                    <input type="text" value="{{ $fuel->operator }}" class="form-control" readonly>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label>Security</label>
                    <input type="text" value="{{ $fuel->security }}" class="form-control" readonly>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label>Fuelman</label>
                    <input type="text" value="{{ $fuel->fuelman }}" class="form-control" readonly>
                  </div>
                </div>
              </div> {{-- row --}}

              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <label for="remarks">Catatan</label>
                    <input type="text" value="{{ $fuel->remarks }}" class="form-control" readonly>
                  </div>
                </div>
              </div>
              
              <div class="card-footer">
                <div class="form-group">
                  <a href="{{ route('fuels.index') }}" class="btn btn-sm btn-primary"><i class="fas fa-undo"></i>  Kembali</a>
                </div>
              </div>

            </form>
          </div>
        </div>

      </div>
    </div>
@endsection



