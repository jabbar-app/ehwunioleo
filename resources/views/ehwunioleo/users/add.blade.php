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
          <h3>Tambah User Baru</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Users</li>
            <li class="breadcrumb-item active">Add New User</li>
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
            <h4 class="mb-3">Tambah User</h4>
          </div>
          <form class="form theme-form" action="/users/add" method="POST">
            @csrf
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                  <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" type="text" name="name" required autofocus autocomplete="name">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-3">
                    <label class="form-label">Nomor Pegawai</label>
                    <input class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik') }}" type="text" name="nik" required>
                    @error('nik')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" type="email" name="email" required>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-3">
                    <label class="form-label">Jabatan</label>
                    <input class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" type="text" name="title" required>
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-3">
                    <label class="form-label" for="role">Role</label>
                    <select class="form-select btn-square digits @error('role') is-invalid @enderror" value="{{ old('role') }}" id="role" name="role" required>
                      <option value="User">User</option>
                      <option value="Safety Leader">Safety Leader</option>
                      <option value="Admin">Admin</option>
                      <option value="Super Admin">Super Admin</option>
                    </select>
                    @error('role')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-form-label">Password</label>
                  <div class="form-input position-relative">
                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" required>
                    @error('password')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                    <div class="show-hide" style="top: 22px !important;"><span class="show"> </span></div>
                  </div>
                </div>

              </div>
            </div>
            <div class="card-footer text-end">
              <input class="btn btn-light" type="reset" value="Batal">
              <button class="btn btn-primary" type="submit">Tambah User</button>
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