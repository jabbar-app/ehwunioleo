@extends('ehwunioleo.layout')


@section('content')
  <div class="row mb-4">
    <div class="col-12">
      <div class="d-flex justify-content-between align-items-center">
        <h4 class="text-primary mb-0">
          <a href="{{ route('dashboard') }}" class="text-muted fw-light">Dashboard /</a> Update Pengangkutan LB3
        </h4>
        <a href="{{ route('dashboard') }}" class="btn btn-sm btn-outline-secondary">Kembali</a>
      </div>
    </div>
  </div>

  <hr class="mb-4">

  <div class="row mb-4">
    <div class="col-xl-6 col-sm-12 mx-auto">
      <div class="card">
        <div class="card-header pb-0">
          <!-- Super Admin -->
          <div class="setting-header d-flex justify-content-between">
            <h4 class="mt-1">Detail Request</h4>
            <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST" class="d-inline">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger"
                onclick="return confirm('Apakah Anda yakin ingin menghapus template ini?');">
                <i class="ti ti-trash me-1"></i> Delete
              </button>
            </form>
          </div>
        </div>
        @if (Auth::user()->role == 'User')
          <form class="form theme-form" action="{{ route('schedule.resubmit', $schedule->id) }}" method="POST">
            <input type="hidden" name="user_name" value="{{ $schedule->user_name }}">
            <input type="hidden" name="user_id" value="{{ $schedule->user_id }}">
            <input type="hidden" name="date" value="{{ $schedule->date }}">
            <input type="hidden" name="waste_name" value="{{ $schedule->waste_name }}">
            <input type="hidden" name="waste_code" value="{{ $schedule->waste_code }}">
            @csrf
            <div class="card-body">
              <div class="row">
                <div class="col-xl-12 col-sm-12 mb-5">
                  <div class="mb-3">
                    <label class="form-label">Status</label>
                    <div class="alert alert-warning">{{ $schedule->status }} - cek kembali data request!</div>
                  </div>
                </div>
                <div class="col-xl-4 col-sm-4">
                  <div class="mb-3">
                    <label class="form-label">Kode Limbah</label>
                    <div class="alert alert-light">{{ $schedule->waste_code }}</div>
                  </div>
                </div>
                <div class="col-xl-8 col-sm-8">
                  <div class="mb-3">
                    <label class="form-label">Jenis Limbah</label>
                    <div class="alert alert-light">{{ $schedule->waste_name }}</div>
                  </div>
                </div>
                <div class="col-xl-4 col-sm-4">
                  <div class="mb-3">
                    <label class="form-label">Jumlah</label>
                    <input class="form-control @error('amount') is-invalid @enderror" value="{{ $schedule->amount }}"
                      type="number" name="amount">
                  </div>
                </div>
                <div class="col-xl-4 col-sm-4">
                  <div class="mb-3">
                    <label class="form-label">Berat (Kg)</label>
                    <input class="form-control @error('weight') is-invalid @enderror" value="{{ $schedule->weight }}"
                      type="number" name="weight">
                  </div>
                </div>
                <div class="col-xl-4 col-sm-4">
                  <div class="mb-3">
                    <label class="form-label">Packaging</label>
                    <select class="form-select btn-square" name="packaging" required>
                      <option value="{{ $schedule->packaging }}" selected>{{ $schedule->packaging }}</option>
                      @if ($schedule->packaging == 'Pallet')
                        <option value="IBC">IBC</option>
                        <option value="Jumbo Bag">Jumbo Bag</option>
                      @elseif($schedule->packaging == 'IBC')
                        <option value="Pallet">Pallet</option>
                        <option value="Jumbo Bag">Jumbo Bag</option>
                      @elseif($schedule->packaging == 'Jumbo Bag')
                        <option value="Pallet">Pallet</option>
                        <option value="IBC">IBC</option>
                      @endif
                    </select>
                    <!-- <input class="form-control" type="text" name="packaging" id="packaging" value="{{ $schedule->packaging }}"> -->
                  </div>
                </div>
                <div class="col-xl-12 col-sm-12">
                  <div class="mb-3">
                    <label class="form-label">Sumber</label>
                    <select class="form-select btn-square digits @error('source') is-invalid @enderror"
                      value="{{ old('source') }}" id="source" name="source" required>
                      <option value="{{ $schedule->source }}" selected>{{ $schedule->source }}</option>
                      <option value="" disabled>-</option>
                      @foreach ($sources as $source)
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
                    <textarea class="form-control" id="note" name="note" rows="4">{{ $schedule->note }}</textarea>
                  </div>
                </div>
              </div>

              <div class="card-footer text-end">
                <a href="/schedule" class="btn btn-light">Kembali</a>
                <button class="btn btn-primary" type="submit">Request Ulang</button>
              </div>
            </div>
          </form>
        @else
          <form class="form theme-form" action="{{ route('schedule.detail', $schedule->id) }}" method="POST">
            @csrf
            <div class="card-body">
              <div class="row">
                <div class="col-xl-12 col-sm-12">
                  <div class="mb-3">
                    <label class="form-label">Petugas</label>
                    <input class="form-control" type="text" name="user_name" id="user_name"
                      value="{{ $schedule->user_name }}" readonly="readonly">
                    <input type="hidden" name="user_id" value="{{ $schedule->user_id }}">
                  </div>
                </div>
                <div class="col-xl-12 col-sm-12">
                  <div class="mb-3">
                    <label class="form-label">Tanggal</label>
                    <input class="form-control" type="text" name="date" id="date"
                      value="{{ $schedule->date }}" readonly="readonly">
                  </div>
                </div>
                <div class="col-xl-4 col-sm-4">
                  <div class="mb-3">
                    <label class="form-label">Kode Limbah</label>
                    <input class="form-control" type="text" name="waste_code" id="waste_code"
                      value="{{ $schedule->waste_code }}" readonly="readonly">
                  </div>
                </div>
                <div class="col-xl-8 col-sm-8">
                  <div class="mb-3">
                    <label class="form-label">Jenis Limbah</label>
                    <input class="form-control" type="text" name="waste_name" id="waste_name"
                      value="{{ $schedule->waste_name }}" readonly="readonly">
                  </div>
                </div>
                <div class="col-xl-4 col-sm-4">
                  <div class="mb-3">
                    <label class="form-label">Jumlah</label>
                    <input class="form-control @error('amount') is-invalid @enderror" value="{{ $schedule->amount }}"
                      type="number" name="amount" readonly="readonly">
                  </div>
                </div>
                <div class="col-xl-4 col-sm-4">
                  <div class="mb-3">
                    <label class="form-label">Berat (Kg)</label>
                    <input class="form-control @error('weight') is-invalid @enderror" value="{{ $schedule->weight }}"
                      type="number" name="weight" readonly="readonly">
                  </div>
                </div>
                <div class="col-xl-4 col-sm-4">
                  <div class="mb-3">
                    <label class="form-label">Packaging</label>
                    <input class="form-control" type="text" name="packaging" id="packaging"
                      value="{{ $schedule->packaging }}" readonly="readonly">
                  </div>
                </div>
                <div class="col-xl-12 col-sm-12">
                  <div class="mb-3">
                    <label class="form-label">Sumber</label>
                    <input class="form-control" type="text" name="source" value="{{ $schedule->source }}"
                      readonly="readonly">
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
                        <input type="checkbox" onclick="changeStatus()" id="v_symbol" name="v_symbol"
                          @if ($schedule->v_symbol != '') checked @endif><span class="switch-state"></span>
                      </label>
                    </div>
                  </div>
                  <div class="d-flex mb-2">
                    <label class="col-form-label m-r-10">Packaging</label>
                    <div class="flex-grow-1 text-end icon-state">
                      <label class="switch">
                        <input type="checkbox" onclick="changeStatus()" id="v_packaging" name="v_packaging"
                          @if ($schedule->v_packaging != '') checked @endif><span class="switch-state"></span>
                      </label>
                    </div>
                  </div>
                  <div class="d-flex mb-2">
                    <label class="col-form-label m-r-10">Label</label>
                    <div class="flex-grow-1 text-end icon-state">
                      <label class="switch">
                        <input type="checkbox" onclick="changeStatus()" id="v_label" name="v_label"
                          @if ($schedule->v_label != '') checked @endif><span class="switch-state"></span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-12 mt-5">
                  <div class="mb-3">
                    <label class="form-label" for="note">Update Catatan/Keterangan</label>
                    <textarea class="form-control" id="note" name="note" rows="4">{{ $schedule->note }}</textarea>
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
        @endif
      </div>
    </div>
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
