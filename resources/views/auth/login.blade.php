@extends('auth.layout')

@section('content')
  <div class="authentication-wrapper authentication-cover authentication-bg">
    <div class="authentication-inner row">
      <div class="d-none d-lg-flex col-lg-7 p-0">
        <img src="{{ asset('uploads/img/background.jpeg') }}" class="auth-cover-bg">
      </div>

      <div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4">
        <div class="w-px-400 mx-auto">
          <!-- Logo -->
          <div class="row mb-2">
            <div class="col-2">
              <img src="{{ asset('assets/img/u_logo.svg') }}" alt="" class="h-100 w-100">
            </div>
          </div>
          <!-- /Logo -->
          <h3 class="mb-1">Welcome to EHWM! 👋</h3>
          <p class="mb-4">Unioleo Waste Management System</p>

          <form class="mb-3" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="nik" class="form-label">Nomor Induk Karyawan (NIK)</label>
              <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik"
                value="{{ old('nik') }}" placeholder="Input NIK" autofocus />
            </div>
            <div class="mb-3 form-password-toggle">
              <div class="d-flex justify-content-between">
                <label class="form-label" for="password">Kata Sandi (Password)</label>
                <a href="{{ route('password.request') }}">
                  <small>Lupa Password?</small>
                </a>
              </div>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password"
                  placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                  aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
              </div>
            </div>
            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember-me" />
                <label class="form-check-label" for="remember-me"> Ingat saya </label>
              </div>
            </div>
            <button class="btn btn-primary d-grid w-100">Login</button>
          </form>

          <p class="text-center">
            <span>Belum punya akun?</span>
            <a href="{{ route('register') }}">
              <span>Register</span>
            </a>
          </p>
        </div>
      </div>

    </div>
  </div>
  <!-- /Login -->
@endsection
