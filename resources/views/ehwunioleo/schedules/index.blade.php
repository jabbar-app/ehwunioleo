@extends('ehwunioleo.layout')

@section('content')
  <div class="row">
    <div class="col-12 col-xl-12 col-sm-12 order-1 order-lg-2">
      <div class="d-flex justify-content-between align-items-center">
        <h4 class="text-primary mb-0">
          <a href="{{ route('dashboard') }}" class="text-muted fw-light">Dashboard /</a> Manajemen Penjadwalan
        </h4>
        <a href="{{ route('wastes.create') }}" class="btn btn-md btn-primary mb-2 float-end">Tambah Data</a>
      </div>
    </div>
  </div>

  @include('ehwunioleo.schedules.process')
  @include('ehwunioleo.schedules.request')
@endsection
