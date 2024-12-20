@extends('ehwunioleo.layout')

@section('content')
<div class="page-body">
  <!-- breadcrumb -->
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-sm-6">
          <h3>Edit Data User</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Users</li>
            <li class="breadcrumb-item active">Edit User</li>
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
            <h4 class="mb-3">Edit User</h4>
          </div>
          <form class="form theme-form" action="/users/edit" method="POST">
            @csrf
            <div class="card-body">
              @foreach($users as $u)
              <input type="hidden" name="id" value="{{ $u->id }}">
              <div class="row">
                <div class="col-12">
                  <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input class="form-control @error('name') is-invalid @enderror" value="{{ $u->name }}" type="text" name="name" required autofocus autocomplete="name">
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
                    <input class="form-control @error('nik') is-invalid @enderror" value="{{ $u->nik }}" type="text" name="nik" required>
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
                    <input class="form-control @error('email') is-invalid @enderror" value="{{ $u->email }}" type="email" name="email" required>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-3">
                    <div class="form-group">
                      <label class="col-form-label">Department</label>
                      <select class="form-select @error('department') is-invalid @enderror" id="department" name="department" required>
                        <option value="{{ $u->department }}" selected disabled>{{ $u->department }}</option>
                        @foreach($departments as $d)
                        <option value="{{ $d->name }}">{{ $d->name }}</option>
                        @endforeach
                      </select>
                      @error('department')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-3">
                    <div class="form-group">
                      <label class="col-form-label">Jabatan</label>
                      <select class="form-select @error('title') is-invalid @enderror" id="title" name="title" required>
                        <option value="{{ $u->title }}" selected readonly="readonly">{{ $u->title }}</option>
                        @foreach($titles as $t)
                        <option value="{{ $t->title }}">{{ $t->title }}</option>
                        @endforeach
                      </select>
                      @error('title')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-3">
                    <label class="form-label" for="role">Role</label>
                    <select class="form-select btn-square digits @error('role') is-invalid @enderror" value="{{ $u->role }}" id="role" name="role" required>
                      <?php
                      if ($u->role == "Super Admin") {
                        echo "
                          <option value='Super Admin' selected>Super Admin</option>
                          <option value='Admin'>Admin</option>
                          <option value='Safety Leader'>Safety Leader</option>
                          <option value='User'>User</option>
                          ";
                      } elseif ($u->role == "Admin") {
                        echo "
                          <option value='Super Admin' selected>Super Admin</option>
                          <option value='Admin' selected>Admin</option>
                          <option value='Safety Leader'>Safety Leader</option>
                          <option value='User'>User</option>
                          ";
                      } elseif ($u->role == "Safety Leader") {
                        echo "
                          <option value='Super Admin' selected>Super Admin</option>
                          <option value='Admin'>Admin</option>
                          <option value='Safety Leader' selcted>Safety Leader</option>
                          <option value='User'>User</option>
                          ";
                      } else {
                        echo "
                          <option value='Super Admin' selected>Super Admin</option>
                          <option value='Admin'>Admin</option>
                          <option value='Safety Leader'>Safety Leader</option>
                          <option value='User' selected>User</option>
                          ";
                      }
                      ?>

                    </select>
                    @error('role')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            <div class="card-footer text-end">
              <a href="/users" class="btn btn-light">Kembali</a>
              <button class="btn btn-primary" type="submit">Update User</button>
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
