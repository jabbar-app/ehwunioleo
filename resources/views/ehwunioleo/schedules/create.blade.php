@extends('ehwunioleo.layout')

@section('content')
  <div class="row mb-4">
    <div class="col-12">
      <div class="d-flex justify-content-between align-items-center">
        <h4 class="text-primary mb-0">
          <a href="{{ route('dashboard') }}" class="text-muted fw-light">Dashboard /</a> Tambah Penjadwalan
        </h4>
        <a href="{{ route('dashboard') }}" class="btn btn-sm btn-outline-secondary">Kembali</a>
      </div>
    </div>
  </div>

  <hr class="mb-4">

  <div class="row mb-4">
    <div class="col-12 col-md-8 mx-auto">
      <div class="card">
        <div class="card-header pb-0">
          <!-- Super Admin -->
          <h4 class="mb-3">Request Pengangkutan</h4>
          @if ($errors->any())
            <div class="alert alert-danger">Error - pastikan telah mengisi semua form dengan benar!</div>
          @endif
        </div>
        <form action="{{ route('schedules.store') }}" method="POST">
          @csrf
          <input type="hidden" name="user_name" value="{{ Auth::user()->name }}">
          <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
          <div class="card-body">
            <div class="row">
              <div class="col-xl-12 col-sm-12">
                <div class="mb-3">
                  <label class="form-label">Jenis Limbah</label>
                  <select class="form-select select2 @error('waste_id') is-invalid @enderror"
                    value="{{ old('waste_id') }}" id="waste_id" name="waste_id" required>
                    <option value="" selected disabled>- Pilih Data -</option>
                    @foreach ($wastes as $waste)
                      <option value="{{ $waste->id }}">{{ $waste->waste_name }}  ({{ $waste->waste_code }})</option>
                    @endforeach
                  </select>

                </div>
              </div>
              <div class="col-xl-2 col-sm-12">
                <div class="mb-3">
                  <label class="form-label">Jumlah</label>
                  <input class="form-control @error('amount') is-invalid @enderror" placeholder="0" type="number"
                    name="amount" required>

                </div>
              </div>
              <div class="col-xl-4 col-sm-12">
                <div class="mb-3">
                  <label class="form-label">Packaging</label>
                  <select class="form-select select2 @error('packaging') is-invalid @enderror"
                    value="{{ old('packaging') }}" id="packaging" name="packaging" required>
                    <option value="" selected disabled>- Pilih Data -</option>
                    <option value="Pallet">Pallet</option>
                    <option value="IBC">IBC</option>
                    <option value="Jumbo Bag">Jumbo Bag</option>
                  </select>

                  <!-- <input class="form-control" type="text" name="packaging" id="packaging" placeholder="Pack" readonly="readonly"> -->
                </div>
              </div>
              <div class="col-xl-2 col-sm-12">
                <div class="mb-3">
                  <label class="form-label">Berat (Kg)</label>
                  <input class="form-control @error('weight') is-invalid @enderror" placeholder="0" type="number"
                    name="weight" required>
                </div>
              </div>
              <div class="col-xl-4 col-sm-12">
                <div class="mb-3">
                  <label class="form-label">Source</label>
                  <select class="form-select select2 @error('source') is-invalid @enderror"
                    value="{{ old('source') }}" id="source" name="source" required>
                    <option value="" selected disabled>- Pilih Data -</option>
                    @foreach ($sources as $s)
                      <option value="{{ $s->name }}">{{ $s->name }}</option>
                    @endforeach
                  </select>

                </div>
              </div>

              <div class="col-lg-12 col-sm-12 mt-2">
                <div class="mb-3">
                  <label class="form-label" for="note">Catatan/Keterangan</label>
                  <textarea class="form-control @error('note') is-invalid @enderror" id="note" name="note" rows="4"
                    required></textarea>

                </div>
              </div>
              <div class="card-footer text-end">
                <a href="/schedule" class="btn btn-light">Kembali</a>
                <button class="btn btn-primary" onclick="confirmRequest()">Tambah Request</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
