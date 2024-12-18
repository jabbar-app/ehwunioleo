@extends('ehwunioleo.auth.main')

@section('form')
<div class="login-card bg">
  <div>
    <div class="login-main">
      <form class="theme-form" method="POST" action="/register">
        @csrf
        <h4>Register</h4>
        <p>Silakan lengkapi form berikut</p>
        <div class="form-group">
          <label class="col-form-label">Nama Lengkap</label>
          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
          @error('name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="form-group">
          <label class="col-form-label">Nomor Pegawai</label>
          <input id="nik" type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ old('nik') }}" required autocomplete="nik">
          @error('nik')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="form-group">
          <label class="col-form-label">Department</label>
          <!-- <input id="department" type="text" class="form-control @error('department') is-invalid @enderror" name="department" value="{{ old('department') }}" required autocomplete="department"> -->
          <select class="form-select @error('department') is-invalid @enderror" id="department" name="department" required>
            <option selected disabled>- Pilih Department -</option>
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

        <div class="form-group">
          <label class="col-form-label">Jabatan</label>
          <select class="form-select @error('title') is-invalid @enderror" id="title" name="title" required>
            <option selected disabled>- Pilih Jabatan -</option>
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

        <div class="form-group">
          <label class="col-form-label">Email</label>
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
          @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="form-group">
          <label class="col-form-label">Password</label>
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
          @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="form-group">
          <label class="col-form-label">Ulangi Password</label>
          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>

        <div class="row m-1 mt-4">
          <button type="submit" class="btn btn-primary btn-block">
            {{ __('Register') }}
          </button>
        </div>

        <p class="mt-4 mb-0 text-center mx-5">Sudah terdaftar?<a class="ms-2" href="/login">Login</a></p>
      </form>
    </div>
  </div>
</div>
@endsection