@extends('ehwunioleo.layout')

@section('content')
  <div class="row">
    <div class="col-12 col-xl-12 col-sm-12 order-1 order-lg-2 mb-4 mb-lg-0">
      <div class="d-flex justify-content-between align-items-center my-3">
        <h4 class="text-primary">
          <a href="{{ route('dashboard') }}" class="text-muted fw-light">Dashboard /</a> Manajemen Mengaturan
        </h4>
        <a href="{{ route('dashboard') }}" class="btn btn-sm btn-outline-secondary mb-2 float-end">Kembali</a>
      </div>
      <div class="card mb-4">
        <div class="card-header">
          <div class="card-title">Data Cost Limbah B3</div>
        </div>
        <div class="card-datatable table-responsive">
          <table id="reportsTable" class="table">
            <thead>
              <tr>
                <th>Tanggal</th>
                <th>Nama Limbah</th>
                <th>Source</th>
                <th>Cost</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($reports as $report)
                <tr>
                  <td>{{ $report->date }}</td>
                  <td>{{ $report->waste_name }}</td>
                  <td>{{ $report->source }}</td>
                  <td>{{ $report->cost }}</td>
                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="ti ti-dots-vertical"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a href="{{ route('reports.edit', $report->id) }}" class="dropdown-item waves-effect">
                          <i class="ti ti-pencil ti-sm me-1"></i> Edit
                        </a>
                        <form action="{{ route('reports.destroy', $report->id) }}" method="POST" class="d-inline">
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

      <div class="card mb-4">
        <div class="card-header">
          <div class="card-title">Pengaturan Limbah B3</div>
        </div>
        <div class="card-datatable table-responsive">
          <table id="wastesTable" class="table">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama Limbah</th>
                <th>Kode</th>
                <th>Packaging</th>
                <th>Kapasitas</th>
                <th>Terisi</th>
                <th>Tindakan</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($wastes as $waste)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $waste->waste_name }}</td>
                  <td>{{ $waste->waste_code }}</td>
                  <td>{{ $waste->packaging }}</td>
                  <td>{{ $waste->capacity }}</td>
                  <td>{{ $waste->used }}</td>
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

      <div class="card mb-4">
        <div class="card-header">
          <div class="card-title">Pengaturan Provider (3P)</div>
        </div>
        <div class="card-datatable table-responsive">
          <table id="providersTable" class="table">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama Provider (3P)</th>
                <th>Jenis Limbah</th>
                <th>Alamat</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($providers as $provider)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $provider->name }}</td>
                  <td>{{ $provider->waste }}</td>
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

  <div class="row">
    <div class="col-6">


      <div class="card mb-4">
        <div class="card-header">
          <div class="card-title">Pengaturan Source</div>
        </div>
        <div class="card-datatable table-responsive">
          <table id="sourcesTable" class="table">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama Source</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($sources as $source)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $source->name }}</td>
                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="ti ti-dots-vertical"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a href="{{ route('sources.edit', $source->id) }}" class="dropdown-item waves-effect">
                          <i class="ti ti-pencil ti-sm me-1"></i> Edit
                        </a>
                        <form action="{{ route('sources.destroy', $source->id) }}" method="POST" class="d-inline">
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

    <div class="col-6">
      <div class="card mb-4">
        <div class="card-header">
          <div class="card-title">Pengaturan Department</div>
        </div>
        <div class="card-datatable table-responsive">
          <table id="departmentsTable" class="table">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama Department</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($departments as $department)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $department->name }}</td>
                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="ti ti-dots-vertical"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a href="{{ route('departments.edit', $department->id) }}" class="dropdown-item waves-effect">
                          <i class="ti ti-pencil ti-sm me-1"></i> Edit
                        </a>
                        <form action="{{ route('departments.destroy', $department->id) }}" method="POST"
                          class="d-inline">
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
      $('#reportsTable').DataTable({
        "order": [
          [0, 'asc']
        ]
      });
    });

    $(document).ready(function() {
      $('#wastesTable').DataTable({
        "order": [
          [0, 'asc']
        ]
      });
    });

    $(document).ready(function() {
      $('#providersTable').DataTable({
        "order": [
          [0, 'asc']
        ]
      });
    });

    $(document).ready(function() {
      $('#sourcesTable').DataTable({
        "order": [
          [0, 'asc']
        ]
      });
    });

    $(document).ready(function() {
      $('#departmentsTable').DataTable({
        "order": [
          [0, 'asc']
        ]
      });
    });
  </script>
@endpush
