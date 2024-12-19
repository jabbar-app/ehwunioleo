@extends('ehwunioleo.layout')


@section('content')
  <div class="row mb-4">
    <div class="col-12">
      <div class="d-flex justify-content-between align-items-center">
        <h4 class="text-primary mb-0">
          <a href="{{ route('dashboard') }}" class="text-muted fw-light">Dashboard /</a> Tambah User Baru
        </h4>
        <a href="{{ route('dashboard') }}" class="btn btn-sm btn-outline-secondary">Kembali</a>
      </div>
    </div>
  </div>

  <hr class="mb-4">

  <div class="row mb-4">
    <div class="col-12 col-md-6 mx-auto">
      <div class="card">
        <div class="card-body">
          <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" required autofocus autocomplete="name">
              @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label">Nomor Pegawai</label>
              <input type="number" class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik') }}" name="nik" required>
              @error('nik')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" type="email"
                name="email" required>
              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label">Jabatan</label>
              <input class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" type="text"
                name="title" required>
              @error('title')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="role">Role</label>
              <select class="form-select btn-square digits @error('role') is-invalid @enderror"
                value="{{ old('role') }}" id="role" name="role" required>
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

            <div class="mb-4">
              <label class="form-label">Password</label>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password"
                  placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                  aria-describedby="password" />
                <span class="input-group-text cursor-pointer" id="togglePassword">
                  <i class="ti ti-eye-off" id="toggleIcon"></i>
                </span>
              </div>
              @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <button class="btn btn-primary float-end" type="submit">Tambah User</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    document.getElementById('togglePassword').addEventListener('click', function() {
      const passwordInput = document.getElementById('password');
      const toggleIcon = document.getElementById('toggleIcon');

      // Toggle the type attribute
      const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordInput.setAttribute('type', type);

      // Toggle the eye icon
      toggleIcon.classList.toggle('ti-eye-off');
      toggleIcon.classList.toggle('ti-eye');
    });
  </script>
@endpush
