@extends('ehwunioleo.layout')

@section('content')
  <div class="row">
    <div class="col-12 col-xl-12 col-sm-12 order-1 order-lg-2 mb-4 mb-lg-0">
      <div class="d-flex justify-content-between align-items-center my-3">
        <h4 class="text-primary">
          <a href="{{ route('dashboard') }}" class="text-muted fw-light">Dashboard /</a> Manajemen Laporan
        </h4>
        <a href="{{ route('reports.create') }}" class="btn btn-md btn-primary mb-2 float-end">Tambah Data</a>
      </div>
      <div class="card">
        <div class="card-datatable table-responsive">
          <table id="reportsTable" class="table">
            <thead>
              <tr>
                <th>Tgl. Masuk</th>
                <th>Tgl. Keluar</th>
                <th>Petugas</th>
                <th>Data Limbah</th>
                <th>Tujuan</th>
                <th>Catatan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($reports as $report)
                <tr>
                  <td>{{ $report->date_in }}</td>
                  <td>{{ $report->date }}</td>
                  <td>{{ $report->user_name }}</td>
                  <td>
                    <p class="mb-0 text-nowrap"><small><span class="text-muted">Nama Limbah:
                        </span>{{ $report->waste_name }}</small></p>
                    <p class="mb-0 text-nowrap"><small><span class="text-muted">Source:
                        </span>{{ $report->source }}</small></p>
                    <p class="mb-0 text-nowrap"><small><span class="text-muted">Jumlah:
                        </span>{{ $report->amount }}</small></p>
                    <p class="mb-0 text-nowrap"><small><span class="text-muted">Berat: </span>{{ $report->weight }}
                        kg</small></p>
                    <p class="mb-0 text-nowrap"><small><span class="text-muted">Packaging:
                        </span>{{ $report->packaging }}</small></p>
                  </td>
                  <td>{{ $report->dispose_to }}</td>
                  <td>{{ $report->note }}</td>
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
                            onclick="return confirm('Apakah Anda yakin ingin menghapus report ini?');">
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
          [1, 'desc']
        ]
      });
    });
  </script>
@endpush
