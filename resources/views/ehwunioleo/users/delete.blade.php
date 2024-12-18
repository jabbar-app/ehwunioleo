@extends('ehwunioleo.layout.main')

@section('body')
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
          <form class="form theme-form" action="/users/delete" method="POST">
            @csrf
            <div class="card-body">
              @foreach($users as $u)
              <input type="hidden" name="id" value="{{ $u->id }}">
              <div class="row">
                <div class="col-12">
                  <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input class="form-control @error('name') is-invalid @enderror" value="{{ $u->name }}" type="text" name="name" disabled>
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
                    <input class="form-control @error('nik') is-invalid @enderror" value="{{ $u->nik }}" type="text" name="nik" disabled>
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
                    <input class="form-control @error('email') is-invalid @enderror" value="{{ $u->email }}" type="email" name="email" disabled>
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
                    <input class="form-control @error('title') is-invalid @enderror" value="{{ $u->title }}" type="text" name="title" disabled>
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
                    <select class="form-select btn-square digits @error('role') is-invalid @enderror" value="{{ $u->role }}" id="role" name="role" disabled>
                      <?php
                      if($u->role == "Super Admin"){
                        echo "
                          <option value='Super Admin' selected>Super Admin</option>
                          <option value='Admin'>Admin</option>
                          <option value='Safety Leader'>Safety Leader</option>
                          <option value='User'>User</option>
                          ";
                      }
                      elseif($u->role == "Admin"){
                        echo "
                          <option value='Super Admin' selected>Super Admin</option>
                          <option value='Admin' selected>Admin</option>
                          <option value='Safety Leader'>Safety Leader</option>
                          <option value='User'>User</option>
                          ";
                      }
                      elseif($u->role == "Safety Leader"){
                        echo "
                          <option value='Super Admin' selected>Super Admin</option>
                          <option value='Admin'>Admin</option>
                          <option value='Safety Leader' selcted>Safety Leader</option>
                          <option value='User'>User</option>
                          ";
                      }
                      else {
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
              <button class="btn btn-danger" type="submit">Hapus User</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- content end -->

</div>
@endsection