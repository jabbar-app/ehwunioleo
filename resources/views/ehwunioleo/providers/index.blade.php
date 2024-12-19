@extends('ehwunioleo.layout')

@section('content')
  <div class="row">
    <div class="col-12 col-xl-12 col-sm-12 order-1 order-lg-2 mb-4 mb-lg-0">
      <div class="d-flex justify-content-between align-items-center my-3">
        <h4 class="text-primary">
          <a href="{{ route('dashboard') }}" class="text-muted fw-light">Dashboard /</a> Manajemen Provider (3P)
        </h4>
        <a href="{{ route('providers.create') }}" class="btn btn-md btn-primary mb-2 float-end">Tambah Data</a>
      </div>
      <div class="card">
        <div class="card-datatable table-responsive">
          <table id="providersTable" class="table">
            <thead>
              <tr>
                <th>Nama Pengelola</th>
                <th>Jenis Limbah</th>
                <th>Jadwal Kontrak</th>
                <th>Alamat</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($providers as $provider)
                <tr>
                  <td>{{ $provider->name }}</td>
                  <td>{{ $provider->waste }}</td>
                  <td>{{ $provider->contract }}</td>
                  <td>{{ $provider->address }}</td>
                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="ti ti-dots-vertical"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a href="{{ route('providers.edit', $provider->id) }}" class="dropdown-item waves-effect">
                          <i class="ti ti-pencil ti-sm me-1"></i> Edit
                        </a>
                        <form action="{{ route('providers.destroy', $provider->id) }}" method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="dropdown-item waves-effect text-danger"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                            <i class="ti ti-trash me-1"></i> Hapus
                          </button>
                        </form>
                      </div>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    $(document).ready(function() {
      $('#providersTable').DataTable({
        "order": [
          [0, 'asc']
        ]
      });
    });
  </script>
@endpush
