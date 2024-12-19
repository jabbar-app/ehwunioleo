@extends('ehwunioleo.layout')

@section('content')
  <div class="row mb-4">
    <div class="col-12">
      <div class="d-flex justify-content-between align-items-center">
        <h4 class="text-primary mb-0">
          <a href="{{ route('dashboard') }}" class="text-muted fw-light">Dashboard /</a> Kelola Role User
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
          <form action="{{ route('roles.update') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label class="form-label">Nama Lengkap</label>
              <select name="user_id" class="form-select" id="userSelect" required>
                <option value="">Pilih Nama</option>
                @foreach ($users as $user)
                  <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="mb-3">
              <label class="form-label">Role</label>
              <select name="role" class="form-select" required>
                <option value="User">User</option>
                <option value="Safety Leader">Safety Leader</option>
                <option value="Admin">Admin</option>
                <option value="Super Admin">Super Admin</option>
              </select>
            </div>

            <button class="btn btn-primary float-end" type="submit">Set Role</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    $(document).ready(function() {
      $('#userSelect').select2({
        placeholder: "Pilih Nama",
        allowClear: true
      });
    });
  </script>
@endpush
