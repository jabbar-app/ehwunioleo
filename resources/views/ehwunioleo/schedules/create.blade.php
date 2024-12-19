@extends('ehwunioleo.layout')

@section('css')
@endsection

@section('content')
<div class="page-body">
  <!-- breadcrumb -->
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-sm-6">
          <h3>Pengangkutan LB3</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Limbah B3</li>
            <li class="breadcrumb-item active">Tambah Request</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- contents start -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header pb-0">
            <!-- Super Admin -->
            <h4 class="mb-3">Request Pengangkutan</h4>
                  @if ($errors->any())
                  <div class="alert alert-danger">Error - pastikan telah mengisi semua form dengan benar!</div>
                  @endif
          </div>
          <form class="form theme-form" action="/schedule/create" method="POST" id="request-form">
            @csrf
            <input type="hidden" name="user_name" value="{{ Auth::user()->name }}">
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <div class="card-body">
              <div class="row">
                <div class="col-xl-8 col-sm-12">
                  <div class="mb-3">
                    <label class="form-label">Jenis Limbah</label>
                    <select class="form-select btn-square digits @error('waste_name') is-invalid @enderror" value="{{ old('waste_name') }}" id="waste_name" name="waste_name" required>
                      <option value="" selected disabled>- Pilih Data -</option>
                      @foreach($wastes as $w)
                      <option value="{{ $w->waste_name }}">{{ $w->waste_name }}</option>
                      @endforeach
                    </select>

                  </div>
                </div>
                <div class="col-xl-4 col-sm-12">
                  <div class="mb-3">
                    <label class="form-label">Kode</label>
                    <input class="form-control @error('waste_code') is-invalid @enderror" type="text" name="waste_code" id="waste_code" placeholder="X XXX X" readonly>
                  </div>
                </div>
                <div class="col-xl-2 col-sm-12">
                  <div class="mb-3">
                    <label class="form-label">Jumlah</label>
                    <input class="form-control @error('amount') is-invalid @enderror" placeholder="0" type="number" name="amount" required>

                  </div>
                </div>
                <div class="col-xl-4 col-sm-12">
                  <div class="mb-3">
                    <label class="form-label">Packaging</label>
                    <select class="form-select btn-square digits @error('packaging') is-invalid @enderror" value="{{ old('packaging') }}" id="packaging" name="packaging" required>
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
                    <input class="form-control @error('weight') is-invalid @enderror" placeholder="0" type="number" name="weight" required>
                  </div>
                </div>
                <div class="col-xl-4 col-sm-12">
                  <div class="mb-3">
                    <label class="form-label">Source</label>
                    <select class="form-select btn-square digits @error('source') is-invalid @enderror" value="{{ old('source') }}" id="source" name="source" required>
                      <option value="" selected disabled>- Pilih Data -</option>
                      @foreach($sources as $s)
                      <option value="{{ $s->name }}">{{ $s->name }}</option>
                      @endforeach
                    </select>

                  </div>
                </div>

                <div class="col-lg-12 col-sm-12 mt-2">
                  <div class="mb-3">
                    <label class="form-label" for="note">Catatan/Keterangan</label>
                    <textarea class="form-control @error('note') is-invalid @enderror" id="note" name="note" rows="4" required></textarea>

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
  </div>
  <!-- content end -->

</div>
@endsection

@section('js')
@include('ehwunioleo.layout.scriptjs')
<script>
  const waste_name = document.querySelector('#waste_name');
  const waste_code = document.querySelector('#waste_code');

  waste_name.addEventListener('change', function() {
    fetch('/schedule/add/checkWaste?waste=' + waste_name.value)
      .then(response => response.json())
      .then(data => waste_code.value = data.waste_code);
  })
</script>
@endsection
