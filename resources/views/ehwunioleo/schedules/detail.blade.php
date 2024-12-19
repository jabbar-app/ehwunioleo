@extends('ehwunioleo.layout')

@section('css')
<link rel="stylesheet" type="text/css" href="/assets/css/vendors/icofont.css">
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
      <div class="col-3"></div>
      <div class="col-xl-6 col-sm-12">
        <div class="card">
          <div class="card-header pb-0">
            <!-- Super Admin -->
            <div class="setting-header d-flex justify-content-between">
              <h4 class="mt-1">Detail Request</h4>
              <a href="#" onclick="confirmDelete()" class="btn btn-sm btn-danger"><i class="fa fa-trash me-2"></i> Hapus</a>
            </div>
            <form action="{{ route('schedule.delete', $id) }}" method="POST" id="delete-request">
              @csrf
            </form>
          </div>
          @if(Auth::user()->role == 'User')
            @foreach($schedules as $s)
            <form class="form theme-form" action="{{ route('schedule.resubmit', $s->id) }}" method="POST">
              <input type="hidden" name="user_name" value="{{ $s->user_name }}">
              <input type="hidden" name="user_id" value="{{ $s->user_id }}">
              <input type="hidden" name="date" value="{{ $s->date }}">
              <input type="hidden" name="waste_name" value="{{ $s->waste_name }}">
              <input type="hidden" name="waste_code" value="{{ $s->waste_code }}">
              @csrf
              <div class="card-body">
                <div class="row">
                  <div class="col-xl-12 col-sm-12 mb-5">
                    <div class="mb-3">
                      <label class="form-label">Status</label>
                      <div class="alert alert-warning">{{ $s->status }} - cek kembali data request!</div>
                    </div>
                  </div>
                  <div class="col-xl-4 col-sm-4">
                    <div class="mb-3">
                      <label class="form-label">Kode Limbah</label>
                      <div class="alert alert-light">{{ $s->waste_code }}</div>
                    </div>
                  </div>
                  <div class="col-xl-8 col-sm-8">
                    <div class="mb-3">
                      <label class="form-label">Jenis Limbah</label>
                      <div class="alert alert-light">{{ $s->waste_name }}</div>
                    </div>
                  </div>
                  <div class="col-xl-4 col-sm-4">
                    <div class="mb-3">
                      <label class="form-label">Jumlah</label>
                      <input class="form-control @error('amount') is-invalid @enderror" value="{{ $s->amount }}" type="number" name="amount">
                    </div>
                  </div>
                  <div class="col-xl-4 col-sm-4">
                    <div class="mb-3">
                      <label class="form-label">Berat (Kg)</label>
                      <input class="form-control @error('weight') is-invalid @enderror" value="{{ $s->weight }}" type="number" name="weight">
                    </div>
                  </div>
                  <div class="col-xl-4 col-sm-4">
                    <div class="mb-3">
                      <label class="form-label">Packaging</label>
                      <select class="form-select btn-square" name="packaging" required>
                        <option value="{{ $s->packaging }}" selected>{{ $s->packaging }}</option>
                        @if($s->packaging=='Pallet')
                        <option value="IBC">IBC</option>
                        <option value="Jumbo Bag">Jumbo Bag</option>
                        @elseif($s->packaging=='IBC')
                        <option value="Pallet">Pallet</option>
                        <option value="Jumbo Bag">Jumbo Bag</option>
                        @elseif($s->packaging=='Jumbo Bag')
                        <option value="Pallet">Pallet</option>
                        <option value="IBC">IBC</option>
                        @endif
                      </select>
                      <!-- <input class="form-control" type="text" name="packaging" id="packaging" value="{{ $s->packaging }}"> -->
                    </div>
                  </div>
                  <div class="col-xl-12 col-sm-12">
                    <div class="mb-3">
                      <label class="form-label">Sumber</label>
                      <select class="form-select btn-square digits @error('source') is-invalid @enderror" value="{{ old('source') }}" id="source" name="source" required>
                        <option value="{{ $s->source }}" selected>{{ $s->source }}</option>
                        <option value="" disabled>-</option>
                        @foreach($sources as $source)
                        <option value="{{ $source->name }}">{{ $source->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-12 mt-5">
                    <div class="mb-3">
                      <label class="form-label" for="note">Update Catatan/Keterangan</label>
                      <textarea class="form-control" id="note" name="note" rows="4">{{ $s->note }}</textarea>
                    </div>
                  </div>
                </div>

                <div class="card-footer text-end">
                  <a href="/schedule" class="btn btn-light">Kembali</a>
                  <button class="btn btn-primary" type="submit">Request Ulang</button>
                </div>
              </div>
            </form>
            @endforeach
          @else
            @foreach($schedules as $s)
            <form class="form theme-form" action="{{ route('schedule.detail', $s->id) }}" method="POST">
              @csrf
              <div class="card-body">
                <div class="row">
                  <div class="col-xl-12 col-sm-12">
                    <div class="mb-3">
                      <label class="form-label">Petugas</label>
                      <input class="form-control" type="text" name="user_name" id="user_name" value="{{ $s->user_name }}" readonly="readonly">
                      <input type="hidden" name="user_id" value="{{ $s->user_id }}">
                    </div>
                  </div>
                  <div class="col-xl-12 col-sm-12">
                    <div class="mb-3">
                      <label class="form-label">Tanggal</label>
                      <input class="form-control" type="text" name="date" id="date" value="{{ $s->date }}" readonly="readonly">
                    </div>
                  </div>
                  <div class="col-xl-4 col-sm-4">
                    <div class="mb-3">
                      <label class="form-label">Kode Limbah</label>
                      <input class="form-control" type="text" name="waste_code" id="waste_code" value="{{ $s->waste_code }}" readonly="readonly">
                    </div>
                  </div>
                  <div class="col-xl-8 col-sm-8">
                    <div class="mb-3">
                      <label class="form-label">Jenis Limbah</label>
                      <input class="form-control" type="text" name="waste_name" id="waste_name" value="{{ $s->waste_name }}" readonly="readonly">
                    </div>
                  </div>
                  <div class="col-xl-4 col-sm-4">
                    <div class="mb-3">
                      <label class="form-label">Jumlah</label>
                      <input class="form-control @error('amount') is-invalid @enderror" value="{{ $s->amount }}" type="number" name="amount" readonly="readonly">
                    </div>
                  </div>
                  <div class="col-xl-4 col-sm-4">
                    <div class="mb-3">
                      <label class="form-label">Berat (Kg)</label>
                      <input class="form-control @error('weight') is-invalid @enderror" value="{{ $s->weight }}" type="number" name="weight" readonly="readonly">
                    </div>
                  </div>
                  <div class="col-xl-4 col-sm-4">
                    <div class="mb-3">
                      <label class="form-label">Packaging</label>
                      <input class="form-control" type="text" name="packaging" id="packaging" value="{{ $s->packaging }}" readonly="readonly">
                    </div>
                  </div>
                  <div class="col-xl-12 col-sm-12">
                    <div class="mb-3">
                      <label class="form-label">Sumber</label>
                      <input class="form-control" type="text" name="source" value="{{ $s->source }}" readonly="readonly">
                    </div>
                  </div>
                </div>

                <div class="row mt-5">
                  <div class="col-xl-12 col-sm-12">
                    <h4 class="form-label">Verifikasi Data</h4>
                    <div class="d-flex mb-2">
                      <label class="col-form-label m-r-10">Simbol</label>
                      <div class="flex-grow-1 text-end icon-state">
                        <label class="switch">
                          <input type="checkbox" onclick="changeStatus()" id="v_symbol" name="v_symbol" @if($s->v_symbol!="") checked @endif><span class="switch-state"></span>
                        </label>
                      </div>
                    </div>
                    <div class="d-flex mb-2">
                      <label class="col-form-label m-r-10">Packaging</label>
                      <div class="flex-grow-1 text-end icon-state">
                        <label class="switch">
                          <input type="checkbox" onclick="changeStatus()" id="v_packaging" name="v_packaging" @if($s->v_packaging!="") checked @endif><span class="switch-state"></span>
                        </label>
                      </div>
                    </div>
                    <div class="d-flex mb-2">
                      <label class="col-form-label m-r-10">Label</label>
                      <div class="flex-grow-1 text-end icon-state">
                        <label class="switch">
                          <input type="checkbox" onclick="changeStatus()" id="v_label" name="v_label" @if($s->v_label!="") checked @endif><span class="switch-state"></span>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-12 mt-5">
                    <div class="mb-3">
                      <label class="form-label" for="note">Update Catatan/Keterangan</label>
                      <textarea class="form-control" id="note" name="note" rows="4">{{ $s->note }}</textarea>
                    </div>
                  </div>

                  <div class="col-12 mt-5">
                    <h4 class="form-label">Status</h4>
                    <div class="alert alert-success dark" role="alert" id="approved">
                      <p>Approved — request pengangkutan dapat diproses!</p>
                    </div>
                    <div class="alert alert-warning dark mb-3" role="alert" id="correction">
                      <p>Correction — request pengangkutan perlu revisi!</p>
                    </div>
                  </div>
                </div>

                <div class="card-footer text-end">
                  <a href="/schedule" class="btn btn-light">Kembali</a>
                  <button class="btn btn-primary" type="submit">Update Request</button>
                </div>
              </div>
            </form>
            @endforeach
          @endif
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
    fetch('/schedule/add/checkWaste?waste=' + waste_name.value)
      .then(response => response.json())
      .then(data => packaging.value = data.packaging)
  })

  var symbol = document.getElementById("v_symbol");
  var pack = document.getElementById("v_packaging");
  var label = document.getElementById("v_label");
  var correction = document.getElementById("correction");
  var approved = document.getElementById("approved");

  window.onload = changeStatus();

  function changeStatus() {
    if (symbol.checked == true && pack.checked == true && label.checked == true) {
      correction.style.display = "none";
      approved.style.display = "block";
    } else {
      approved.style.display = "none";
      correction.style.display = "block";
    }
  }
</script>
@endsection
