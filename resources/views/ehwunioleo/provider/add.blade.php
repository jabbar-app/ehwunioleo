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
          <h3>Tambah Data {{ $title }}</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">{{ $title }}</li>
            <li class="breadcrumb-item active">Tambah {{ $title }}</li>
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
            <h4 class="mb-3">Tambah {{ $title }}</h4>
          </div>
          <form class="form theme-form" action="{{ route('provider.add') }}" method="POST">
            @csrf
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                  <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input class="form-control" type="text" name="name" required>
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-2">
                    <div class="col-form-label" for="waste">Jenis Limbah</div>
                    <textarea class="form-control" name="waste" id="waste" rows="2" required></textarea>
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-3">
                    <label class="form-label">Jadwal Kontrak</label>
                    <input class="datepicker-here form-control digits" type="text" data-range="true" data-multiple-dates-separator=" s.d. " data-language="en" name="contract" required>
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-2">
                    <div class="col-form-label" for="address">Alamat</div>
                    <textarea class="form-control" name="address" id="address" rows="3" required></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer text-end">
              <a href="/settings" class="btn btn-light">Kembali</a>
              <button class="btn btn-primary" type="submit">Tambah {{ $title }}</button>
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
<script src="/assets/js/datepicker/date-picker/datepicker.js"></script>
<script src="/assets/js/datepicker/date-picker/datepicker.en.js"></script>
<script src="/assets/js/datepicker/date-picker/datepicker.custom.js"></script>
@endsection