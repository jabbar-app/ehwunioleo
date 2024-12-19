@extends('ehwunioleo.layout')

@section('content')
<div class="page-body">
  <!-- breadcrumb -->
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-sm-6">
          <h3>Edit Data Cost</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Cost</li>
            <li class="breadcrumb-item active">Edit Cost</li>
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
            <h4 class="mb-3">Edit Cost</h4>
          </div>
          <form class="form theme-form" action="/cost/edit" method="POST">
            @csrf
            <div class="card-body">
              @foreach($reports as $r)
              <input type="hidden" name="id" value="{{ $r->id }}">
              <div class="row">
                <div class="col-12">
                  <div class="mb-3">
                    <label class="form-label">Nama Limbah</label>
                    <input class="form-control" value="{{ $r->waste_name }}" type="text" disabled>
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-3">
                    <label class="form-label">Sumber</label>
                    <input class="form-control" value="{{ $r->source }}" type="text" disabled>
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-3">
                    <label class="form-label">Cost</label>
                    <input class="form-control" value="{{ $r->cost }}" type="text" name="cost" required autofocus>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            <div class="card-footer text-end">
              <a href="/settings" class="btn btn-light">Kembali</a>
              <button class="btn btn-primary" type="submit">Update Cost</button>
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
