@extends('ehwunioleo.auth.main')

@section('form')
<div class="login-card bg">
  <div>
    <div class="login-main">
      <form class="theme-form" method="POST" action="/login">
        @csrf
        <h4>Login</h4>
        @if (session()->has('success'))
        <div class="alert alert-success mt-4 text-center">{{ session('success') }}</div>
        @endif
        @if (session()->has('failed'))
        <div class="alert alert-danger mt-4 text-center">{{ session('failed') }}</div>
        @endif
        @if (session()->has('reset'))
        <div class="alert alert-info mt-4 text-center">{{ session('reset') }}</div>
        @endif
        <p>Input Nomor Pegawai & password kamu</p>
        <div class="form-group">
          <label class="col-form-label">Nomor Pegawai</label>
          <input class="form-control @error('nik') is-invalid @enderror" type="text" name="nik" autofocus value="{{ old('nik') }}" required>
          @error('nik')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
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
            <div class="show-hide"><span class="show"> </span></div>
          </div>
        </div>
        <div class="form-group mb-0">
          <div class="checkbox p-0">
            <input id="checkbox1" type="checkbox">
            <label class="text-muted" for="checkbox1">Ingat saya</label>
          </div>
          <a class="link" href="/password/reset" style="font-size: 13px">Lupa password?</a>
          <div class="text-end mt-3">
            <button class="btn btn-primary btn-block w-100" type="submit">Login</button>
          </div>
        </div>
        <p class="mt-4 mb-0 text-center mx-5">Belum punya akun?<a class="ms-2" href="/register">Register</a></p>

        <center>
          <a href="/assets/pdf/Guide%20Book%20-%20Aplikasi%20EHW%20Unioleo.pdf" target="_blank" class="btn btn-sm btn-info mt-3">Panduan Tutorial</a>
          <a href="#" target="_blank" class="btn btn-sm btn-info mt-3">Lihat Video</a>
        </center>
      </form>
    </div>
  </div>
</div>
@endsection