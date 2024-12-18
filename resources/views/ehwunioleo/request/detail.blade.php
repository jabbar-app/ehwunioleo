@extends('ehwunioleo.layout.main')

@section('css')
@endsection

@section('body')
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
      <div class="col-6">
        <div class="card">
          <div class="card-header pb-0">
            <h4 class="mb-3">Request Pengangkutan</h4>
          </div>
          <form class="form theme-form" action="/request/detail" method="POST">
            @csrf
            <div class="card-body">
              @foreach($schedules as $s)
              <input type="hidden" name="id" value="{{ $s->id }}">
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
                <div class="col-3">
                  <div class="mb-3">
                    <label class="form-label">Kode Limbah</label>
                    <input class="form-control" type="text" name="waste_code" id="waste_code" value="{{ $s->waste_code }}" readonly="readonly">
                  </div>
                </div>
                <div class="col-9">
                  <div class="mb-3">
                    <label class="form-label">Jenis Limbah</label>
                    <input class="form-control" type="text" name="waste_name" id="waste_name" value="{{ $s->waste_name }}" readonly="readonly">
                  </div>
                </div>
                <div class="col-3">
                  <div class="mb-3">
                    <label class="form-label">Jumlah</label>
                    <input class="form-control @error('amount') is-invalid @enderror" value="{{ $s->amount }}" type="number" name="amount" readonly="readonly">
                  </div>
                </div>
                <div class="col-3">
                  <div class="mb-3">
                    <label class="form-label">Jumlah</label>
                    <input class="form-control @error('amount') is-invalid @enderror" value="{{ $s->amount }}" type="number" name="amount" readonly="readonly">
                  </div>
                </div>
                <div class="col-6">
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
                      <input type="checkbox" id="v_symbol" name="v_symbol" disabled @if($s->v_symbol!="") checked @endif>
                      <label for="v_symbol">Simbol</label>
                    </div>
                    <div class="form-check checkbox checkbox-primary mb-1">
                      <input type="checkbox" id="v_packaging" name="v_packaging" disabled @if($s->v_packaging!="") checked @endif>
                      <label for="v_packaging">Packaging</label>
                    </div>
                    <div class="form-check checkbox checkbox-primary mb-1">
                      <input type="checkbox" id="v_label" name="v_label" value="{{ $s->v_label }}" disabled @if($s->v_label!="") checked @endif>
                      <label for="v_label">Label</label>
                    </div>
                  </div>
                </div>

                <div class="col-12">
                  <div class="mb-3 mt-5">
                    <label class="form-label" for="status">Update Status</label>
                    <select class="form-select btn-square btn-primary" style="color: white;" id="status" name="status" required>
                      <option value="{{ $s->status }}" selected>{{ $s->status }}</option>
                    </select>
                  </div>
                </div>

              </div>
              @endforeach
            </div>
            <div class="card-footer text-end">
              <a href="/dashboard" class="btn btn-light">Kembali</a>
              <button class="btn btn-primary" type="submit">Resubmit Request</button>
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