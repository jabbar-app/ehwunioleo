@extends('auth.layout')

@section('content')
  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner py-4">
        <!-- Register Card -->
        <div class="card">
          <div class="card-body">
            <!-- Logo -->
            <div class="row mb-2">
              <div class="col-2">
                <img src="{{ asset('assets/img/u_logo.svg') }}" alt="" class="h-100 w-100">
              </div>
            </div>
            <!-- /Logo -->
            <h3 class="mb-1">Welcome to EHWM! 👋</h3>
            <p class="mb-4">Unioleo Waste Management System</p>

            <form id="formAuthentication" class="mb-3" action="{{ route('register') }}" method="POST">
              @csrf
              <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                  name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="mb-3">
                <label class="form-label">Nomor Pegawai</label>
                <input id="nik" type="text" class="form-control @error('nik') is-invalid @enderror"
                  name="nik" value="{{ old('nik') }}" required autocomplete="nik">
                @error('nik')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="mb-3">
                <label class="form-label">Department</label>
                <select class="form-select @error('department') is-invalid @enderror" id="department" name="department"
                  required>
                  <option selected disabled>- Pilih Department -</option>
                  @foreach ($departments as $d)
                    <option value="{{ $d->name }}" {{ old('department') == $d->name ? 'selected' : '' }}>
                      {{ $d->name }}
                    </option>
                  @endforeach
                </select>
                @error('department')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="mb-3">
                <label class="form-label">Jabatan</label>
                <select class="form-select @error('title') is-invalid @enderror" id="title" name="title" required>
                  <option selected disabled>- Pilih Jabatan -</option>
                  @foreach ($titles as $t)
                    <option value="{{ $t->title }}" {{ old('title') == $t->title ? 'selected' : '' }}>
                      {{ $t->title }}
                    </option>
                  @endforeach
                </select>
                @error('title')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="mb-3">
                <label class="form-label">Email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                  name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="mb-3">
                <label class="form-label">Password</label>
                <div class="input-group input-group-merge">
                  <input type="password" id="password" class="form-control" name="password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password" />
                  <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                </div>
                @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <button type="submit" class="btn btn-primary d-grid w-100">Buat Akun</button>
            </form>

            <p class="text-center">
              <span>Sudah punya akun?</span>
              <a href="{{ route('login') }}">
                <span>Login</span>
              </a>
            </p>
          </div>
        </div>
        <!-- Register Card -->
      </div>
    </div>
  </div>
@endsection
