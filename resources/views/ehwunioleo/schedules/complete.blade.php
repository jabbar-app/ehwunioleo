@extends('ehwunioleo.layout')

@section('css')
<link rel="stylesheet" type="text/css" href="/assets/css/vendors/date-picker.css">
@endsection

@section('content')
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
                  <label class="form-label">Berat (Kg)</label>
                  <input class="form-control @error('weight') is-invalid @enderror" value="{{ $s->weight }}" type="number" name="weight" readonly="readonly">
                </div>
              </div>
              <div class="col-4">
                <div class="mb-3">
                  <label class="form-label">Packaging</label>
                  <input class="form-control" type="text" name="packaging" id="packaging" value="{{ $s->packaging }}" readonly="readonly">
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
                    <input type="checkbox" id="v_symbol" name="v_symbol" checked readonly="readonly">
                    <label for="v_symbol">Simbol</label>
                  </div>
                  <div class="form-check checkbox checkbox-primary mb-1">
                    <input type="checkbox" id="v_packaging" name="v_packaging" checked readonly="readonly">
                    <label for="v_packaging">Packaging</label>
                  </div>
                  <div class="form-check checkbox checkbox-primary mb-1">
                    <input type="checkbox" id="v_label" name="v_label" checked readonly="readonly">
                    <label for="v_label">Label</label>
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
          <form class="form theme-form" action="{{ route('schedule.complete', $s->id) }}" method="POST">
            @csrf
            <div class="card-body">
              <input type="hidden" name="id" value="{{ $s->id }}">
              <input type="hidden" name="date_in" value="{{ $s->date }}">
              <input type="hidden" name="user_name" value="{{ $s->user_name }}">
              <input type="hidden" name="user_id" value="{{ $s->user_id }}">
              <input type="hidden" name="waste_name" value="{{ $s->waste_name }}">
              <input type="hidden" name="waste_code" value="{{ $s->waste_code }}">
              <input type="hidden" name="source" value="{{ $s->source }}">
              <input type="hidden" name="amount" value="{{ $s->amount }}">
              <input type="hidden" name="weight" value="{{ $s->weight }}">
              <input type="hidden" name="packaging" value="{{ $s->packaging }}">
              <input type="hidden" name="dispose_to" value="{{ $s->dispose_to }}">
              <input type="hidden" name="note" value="{{ $s->note }}">

              <div class="row">
                <div class="col-12">
                  <div class="mb-3">
                    <label class="form-label">Tanggal Mulai</label>
                    <div class="alert alert-info dark" role="alert">
                      <p>{{ $s->date }}</p>
                    </div>
                    <input type="hidden" value="{{ $s->date }}" name="date">
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-3 mt-2">
                    <h5 class="form-label">Tujuan 3P</h5>
                    <div class="alert alert-info dark" role="alert">
                      <p>{{ $s->dispose_to }}</p>
                    </div>
                    <input type="hidden" value="{{ $s->dispose_to }}" name="dispose_to">
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-3">
                    <label class="form-label">Tanggal Selesai</label>
                    <input class="datepicker-here form-control digits" placeholder="- Pilih Tanggal -" type="text" name="date" data-language="en" required>
                  </div>
                </div>
              </div>

            </div>
            <div class="card-footer text-end">
              <a href="/schedule" class="btn btn-light">Kembali</a>
              <button class="btn btn-primary" type="submit">Selesaikan Pengangkutan</button>
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
