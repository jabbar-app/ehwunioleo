@extends('ehwunioleo.layout')

@section('content')
<div class="page-body">
  <!-- breadcrumb -->
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-sm-6">
          <h3>Tambah Data Department</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Source</li>
            <li class="breadcrumb-item active">Add Source</li>
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
            <h4 class="mb-3">Tambah Department</h4>
          </div>
          <form class="form theme-form" action="{{ route('department.add') }}" method="POST">
            @csrf
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                  <div class="mb-3">
                    <label class="form-label">Nama Department</label>
                    <input class="form-control" type="text" name="name">
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer text-end">
              <a href="/settings" class="btn btn-light">Kembali</a>
              <button class="btn btn-primary" type="submit">Simpan Data</button>
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
