@extends('ehwunioleo.layout')

@section('content')
  <div class="row mb-4">
    <div class="col-12">
      <div class="d-flex justify-content-between align-items-center">
        <h4 class="text-primary mb-0">
          <a href="{{ route('dashboard') }}" class="text-muted fw-light">Dashboard /</a> Update Penjadwalan
        </h4>
        <a href="{{ route('dashboard') }}" class="btn btn-sm btn-outline-secondary">Kembali</a>
      </div>
    </div>
  </div>

  <hr class="mb-4">

  <div class="row mb-4">
    <div class="col-6">
      @include('ehwunioleo.schedules.card-request')
    </div>
    <div class="col-6">
      <div class="card">
        <div class="card-header pb-0">
          <h4 class="mb-3">Atur Pengangkutan ke 3P</h4>
        </div>
        <form class="form theme-form" action="{{ route('schedule.complete', $schedule->id) }}" method="POST">
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <div class="mb-3">
                  <label class="form-label">Tanggal Mulai</label>
                  <div class="alert alert-info dark" role="alert">
                    <p class="m-0">{{ $schedule->date }}</p>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="mb-3 mt-2">
                  <h5 class="form-label">Tujuan 3P</h5>
                  <div class="alert alert-info dark" role="alert">
                    <p class="m-0">{{ $schedule->dispose_to }}</p>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="mb-3">
                  <label class="form-label">Tanggal Selesai</label>
                  <input type="text" name="date" class="form-control flatpickr-input" placeholder="YYYY-MM-DD"
                    id="flatpickr-date" required>
                </div>
              </div>
            </div>

          </div>
          <div class="card-footer text-end">
            <a href="/schedule" class="btn btn-light">Kembali</a>
            <button class="btn btn-primary" type="submit">Selesaikan Pengangkutan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
