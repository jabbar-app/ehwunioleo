@extends('ehwunioleo.layout')

@section('content')
  <div class="row">
    <div class="col-12 col-xl-12 col-sm-12 order-1 order-lg-2 mb-4 mb-lg-0">
      <div class="d-flex justify-content-between align-items-center my-3">
        <h4 class="text-primary">
          <a href="{{ route('dashboard') }}" class="text-muted fw-light">Dashboard /</a> Manajemen Limbah B3
        </h4>
        <a href="{{ route('wastes.create') }}" class="btn btn-md btn-primary mb-2 float-end">Tambah Data</a>
      </div>
      <div class="card">
        <div class="card-datatable table-responsive">
          <table id="wastesTable" class="table">
            <thead>
              <tr>
                <th>Nama Limbah</th>
                <th>Kode</th>
                <th>Packaging</th>
                <th>Kapasitas</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($wastes as $waste)
                <tr>
                  <td>{{ $waste->waste_name }}</td>
                  <td>{{ $waste->waste_code }}</td>
                  <td>{{ $waste->packaging }}</td>
                  <td>{{ $waste->capacity }}</td>
                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="ti ti-dots-vertical"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a href="{{ route('wastes.edit', $waste->id) }}" class="dropdown-item waves-effect">
                          <i class="ti ti-pencil ti-sm me-1"></i> Edit
                        </a>
                        <form action="{{ route('wastes.destroy', $waste->id) }}" method="POST" class="d-inline">
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
      $('#wastesTable').DataTable();
    });
  </script>
@endpush
