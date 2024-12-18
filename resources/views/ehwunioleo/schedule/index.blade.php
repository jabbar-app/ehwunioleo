@extends('ehwunioleo.layout.main')

@section('body')
<div class="page-body">
  <div class="container-fluid mobile-hide">
    <div class="page-title">
      <div class="row">
        <div class="col-sm-6">
          <h3>Jadwal</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Penjadwalan</li>
            <li class="breadcrumb-item active">Semua Data</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid dashboard-2">
    <div class="row mb-100">
      <div class="col-sm-12">
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> {{ session('success') }}
          <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @elseif(session()->has('warning'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Warning!</strong> {{ session('warning') }}
          <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @include('ehwunioleo.schedule.header')
        @include('ehwunioleo.schedule.request')
        @include('ehwunioleo.schedule.process')
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
@include('ehwunioleo.layout.scriptjs')
@endsection