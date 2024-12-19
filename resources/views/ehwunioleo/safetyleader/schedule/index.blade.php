@extends('ehwunioleo.layout')

@section('content')
<div class="page-body">

<div class="container-fluid mobile-hide">
  <div class="page-title">
    <div class="row col-12">
      <div class="col-sm-6">
        <h3>Dashboard</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard"><i data-feather="home"></i></a></li>
          <li class="breadcrumb-item">Dashboard</li>
          <li class="breadcrumb-item active">EHWM</li>
        </ol>
      </div>
      <div class="col-6 mt-3" style="width: 5%;">
        <h5>Nama</h5>
        <h5>Role</h5>
      </div>
      <div class="col-6 mt-3">
        <h5>: {{ Auth::user()->name }}</h5>
        <h5>: {{ Auth::user()->role }}</h5>
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
        @include('ehwunioleo.schedules.header')
        @include('ehwunioleo.schedules.request')
        @include('ehwunioleo.schedules.process')
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
@include('ehwunioleo.layout.scriptjs')
@endsection
