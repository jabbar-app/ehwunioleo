@extends('ehwunioleo.layout.main')

@section('css')

@endsection

@section('body')
<div class="page-body">
  @foreach($profile as $p)
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-sm-6">
          <h3>Edit Profile</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard"> <i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Users</li>
            <li class="breadcrumb-item active"> Edit Profile</li>
          </ol>
        </div>
      </div>

      <div class="row">
        <div class="col-12 mt-3">
          @if(session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> {{ session('success') }}
            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @elseif(session()->has('danger'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Dihapus!</strong> {{ session('danger') }}
            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="edit-profile">
      <div class="row">
        <div class="col-xl-4 col-lg-5">
          <div class="card">
            <div class="card-header pb-0">
              <h4 class="card-title mb-0">User Profile</h4>
              <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
            </div>
            <div class="card-body">
              <form action="/profile" method="POST">
                @csrf
                <div class="row mb-2">
                  <div class="profile-title">
                    <div class="d-lg-flex d-block align-items-center"><img class="img-70 rounded-circle" alt="" src="{{ asset('assets/uploads/img/prof_pic.png') }}">
                      <div class="flex-grow-1">
                        <h3 class="mb-1 f-20 txt-primary">{{ $p->name  }}</h3>
                        <p class="f-12 mb-0">{{ $p->title  }}</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                  <label class="form-label f-w-500">Change Password</label>
                  <input class="form-control" type="password" name="password" placeholder="New Password">
                </div>
                <div class="mb-3">
                  <input class="form-control" type="password" name="password" placeholder="Repeat Password">
                </div>
                <div class="form-footer">
                  <button class="btn btn-primary btn-block" type="submit">Update Password</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-xl-8 col-lg-7">
          <form class="card" action="/profile" method="POST">
            @csrf
            <div class="card-header pb-0">
              <h4 class="card-title mb-0">Edit Profile</h4>
              <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-12 mb-3">
                  <label class="form-label f-w-500">Nama Lengkap</label>
                  <input class="form-control" type="text" value="{{ $p->name }}" name="name">
                </div>
                <div class="col-12 mb-3">
                  <label class="form-label f-w-500">Nomor Pegawai</label>
                  <input class="form-control" type="text" value="{{ $p->nik }}" disabled>
                </div>
                <div class="col-12 mb-3">
                  <label class="form-label f-w-500">Email</label>
                  <input class="form-control" type="email" value="{{ $p->email }}" disabled>
                </div>
                <div class="col-12 mb-3">
                  <label class="form-label f-w-500">Jabatan</label>
                  <input class="form-control" type="text" value="{{ $p->title }}" disabled>
                </div>
                <div class="col-12 mb-3">
                  <label class="form-label f-w-500">Department</label>
                  <input class="form-control" type="text" value="{{ $p->department }}" disabled>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="alert alert-info dark" role="alert">
                    <p>Catatan! - Untuk melakukan perubahan Nomor Pegawai, Email, Jabatan dan Department, silakan menghubungi Super Admin!</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer text-end">
              <button class="btn btn-primary" type="submit">Update Profile </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection

@section('js')
@include('ehwunioleo.layout.scriptjs')
@endsection