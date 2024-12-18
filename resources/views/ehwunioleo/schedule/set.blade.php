@extends('ehwunioleo.layout.main')

@section('css')
<link rel="stylesheet" type="text/css" href="/assets/css/vendors/date-picker.css">
@endsection

@section('body')
<div class="page-body">
  <!-- breadcrumb -->
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-sm-6">
          <h3>Atur Penjadwalan LB3</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Limbah B3</li>
            <li class="breadcrumb-item active">Atur Penjadwalan</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- contents start -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-6">
        <div class="card">
          <div class="card-header pb-0">
            <h4 class="mb-3">Detail Request</h4>
          </div>
          <div class="card-body">
            @foreach($schedules as $s)
            <div class="row">
              <div class="col-12">
                <div class="mb-3">
                  <label class="form-label">Petugas</label>
                  <input class="form-control" type="text" name="user_name" id="user_name" value="{{ $s->user_name }}" readonly="readonly">
                  <input type="hidden" name="user_id" value="{{ $s->user_id }}">
                </div>
              </div>
              <div class="col-12">
                <div class="mb-3">
                  <label class="form-label">Tanggal</label>
                  <input class="form-control" type="text" name="date" id="date" value="{{ $s->date }}" readonly="readonly">
                </div>
              </div>
              <div class="col-4">
                <div class="mb-3">
                  <label class="form-label">Kode Limbah</label>
                  <input class="form-control" type="text" name="waste_code" id="waste_code" value="{{ $s->waste_code }}" readonly="readonly">
                </div>
              </div>
              <div class="col-8">
                <div class="mb-3">
                  <label class="form-label">Jenis Limbah</label>
                  <input class="form-control" type="text" name="waste_name" id="waste_name" value="{{ $s->waste_name }}" readonly="readonly">
                </div>
              </div>
              <div class="col-4">
                <div class="mb-3">
                  <label class="form-label">Jumlah</label>
                  <input class="form-control @error('amount') is-invalid @enderror" value="{{ $s->amount }}" type="number" name="amount" readonly="readonly">
                </div>
              </div>
              <div class="col-4">
                <div class="mb-3">
                  <label class="form-label">Packaging</label>
                  <input class="form-control" type="text" name="packaging" id="packaging" value="{{ $s->packaging }}" readonly="readonly">
                </div>
              </div>
              <div class="col-4">
                <div class="mb-3">
                  <label class="form-label">Berat (Kg)</label>
                  <input class="form-control" type="text" name="weight" id="weight" value="{{ $s->weight }}" readonly="readonly">
                </div>
              </div>
              <div class="col-12">
                <div class="mb-3">
                  <label class="form-label">Sumber</label>
                  <input class="form-control" type="text" name="source" value="{{ $s->source }}" readonly="readonly">
                </div>
              </div>

              <div class="col-12 mt-5">
                <div class="mb-3">
                  <label class="form-label" for="note">Catatan/Keterangan</label>
                  <textarea class="form-control" id="note" name="note" rows="4" disabled>{{ $s->note }}</textarea>
                </div>
              </div>

              <div class="col-12 mt-5">
                <div class="mb-3">
                  <label class="form-label">Verifikasi Data</label>
                  <div class="form-check checkbox checkbox-primary mb-1">
                    <input type="checkbox" checked disabled>
                    <label>Simbol</label>
                  </div>
                  <div class="form-check checkbox checkbox-primary mb-1">
                    <input type="checkbox" checked disabled>
                    <label>Packaging</label>
                  </div>
                  <div class="form-check checkbox checkbox-primary mb-1">
                    <input type="checkbox" checked disabled>
                    <label>Label</label>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="card">
          <div class="card-header pb-0">
            <h4 class="mb-3">Atur Pengangkutan ke 3P</h4>
          </div>
          @foreach($schedules as $s)
          <form class="form theme-form" action="{{ route('schedule.set', $s->id) }}" method="POST">
            @csrf
            <div class="card-body">
              <input type="hidden" name="amount" value="{{ $s->amount }}">
              <div class="row">
                <div class="col-12">
                  <div class="mb-3">
                    <label class="form-label">Tanggal</label>
                    <div class="input-group">
                      <input class="datepicker-here form-control digits" type="text" name="date" data-language="en" required>
                    </div>
                    <!-- <input class="form-control"  required> -->
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-3 mt-2">
                    <label class="col-form-label" for="provider">Tujuan 3P</label>
                    <select class="form-select" id="provider" name="provider" required>
                      <option selected disabled>- Pilih Data -</option>
                      @foreach($providers as $provider)
                      <option value="{{ $provider->name }}">{{ $provider->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

              </div>
            </div>
            <div class="card-footer text-end">
              <a href="/schedule" class="btn btn-light">Kembali</a>
              <button class="btn btn-primary" type="submit">Set Jadwal</button>
            </div>
          </form>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <!-- content end -->

</div>
@endsection

@section('js')
@include('ehwunioleo.layout.scriptjs')
<script src="/assets/js/datepicker/date-picker/datepicker.js"></script>
<script src="/assets/js/datepicker/date-picker/datepicker.en.js"></script>
<script src="/assets/js/datepicker/date-picker/datepicker.custom.js"></script>
<script>
  const waste_name = document.querySelector('#waste_name');
  const waste_code = document.querySelector('#waste_code');
  const packaging = document.querySelector('#packaging');

  waste_name.addEventListener('change', function() {
    fetch('/schedule/add/checkWaste?waste=' + waste_name.value)
      .then(response => response.json())
      .then(data => waste_code.value = data.waste_code);
    fetch('/schedule/add/checkWaste?waste=' + waste_name.value)
      .then(response => response.json())
      .then(data => packaging.value = data.packaging)
  })
</script>
@endsection