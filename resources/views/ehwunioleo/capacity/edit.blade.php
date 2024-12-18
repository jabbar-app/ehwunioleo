@extends('ehwunioleo.layout.main')

@section('body')
<div class="page-body">
  <!-- breadcrumb -->
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-sm-6">
          <h3>Update Kapasitas</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Limbah B3</li>
            <li class="breadcrumb-item active">Update Kapasitas</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- contents start -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-3"></div>
      <div class="col-xl-6 col-md-12 col-sm-12">
        <div class="card">
          <div class="card-header pb-0">
            <h4 class="mb-3">Edit Limbah</h4>
          </div>
          <form class="form theme-form" action="/capacity/edit" method="POST">
            @csrf
            <div class="card-body">
              @foreach($wastes as $w)
              <input type="hidden" name="id" value="{{ $w->id }}">
              <div class="row">
                <div class="col-12">
                  <div class="mb-3">
                    <label class="form-label">Nama Limbah</label>
                    <input class="form-control" value="{{ $w->waste_name }}" type="text" name="waste_name" required>
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-3">
                    <label class="form-label">Kode Limbah</label>
                    <input class="form-control" value="{{ $w->waste_code }}" type="text" name="waste_code" required>
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-3">
                    <label class="form-label">Kapasitas</label>
                    <input class="form-control" value="{{ $w->capacity }}" type="number" name="capacity" required>
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-3">
                    <label class="form-label">Packaging</label>
                    <input class="form-control" value="{{ $w->packaging }}" type="text" name="packaging" required>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            <div class="card-footer text-end">
              <a href="/settings" class="btn btn-light">Kembali</a>
              <button class="btn btn-primary" type="submit">Update Limbah</button>
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