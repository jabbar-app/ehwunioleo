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
          <h3>Edit Data {{ $title }}</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">{{ $title }}</li>
            <li class="breadcrumb-item active">Edit {{ $title }}</li>
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
            <h4 class="mb-3">Edit {{ $title }}</h4>
          </div>
          @foreach($providers as $provider)
          <form class="form theme-form" action="{{ route('provider.update', $provider->id) }}" method="POST">
            @csrf
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                  <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input class="form-control" value="{{ $provider->name }}" type="text" name="name">
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-2">
                    <div class="col-form-label" for="waste">Jenis Limbah</div>
                    <textarea class="form-control" name="waste" id="waste" rows="2">{{ $provider->waste }}</textarea>
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-3">
                    <label class="form-label">Jadwal Kontrak</label>
                    <input class="datepicker-here form-control digits" type="text" data-range="true" data-multiple-dates-separator=" s.d. " data-language="en" name="contract" value="{{ $provider->contract }}">
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-2">
                    <div class="col-form-label" for="address">Alamat</div>
                    <textarea class="form-control" name="address" id="address" rows="3">{{ $provider->address }}</textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer text-end">
              <a href="/settings" class="btn btn-light">Kembali</a>
              <button class="btn btn-primary" type="submit">Update {{ $title }}</button>
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
@endsection
