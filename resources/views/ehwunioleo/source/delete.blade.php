@extends('ehwunioleo.layout')

@section('content')
<div class="page-body">
  <!-- breadcrumb -->
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-sm-6">
          <h3>Hapus Data Sumber</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Source</li>
            <li class="breadcrumb-item active">Delete Source</li>
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
            <h4 class="mb-3">Hapus Sumber</h4>
            <p class="mb-3">Apakah Anda yakin ingin menghapus data Sumber ini?</p>
          </div>
          <form class="form theme-form" action="/source/delete" method="POST">
            @csrf
            <div class="card-body">
              @foreach($sources as $source)
              <input type="hidden" name="id" value="{{ $source->id }}">
              <div class="row">
                <div class="col-12">
                  <div class="mb-3">
                    <label class="form-label">Nama Sumber</label>
                    <input class="form-control" value="{{ $source->name }}" type="text" name="name">
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            <div class="card-footer text-end">
              <a href="/settings" class="btn btn-light">Kembali</a>
              <button class="btn btn-danger" type="submit">Delete Sumber</button>
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
@endsection
