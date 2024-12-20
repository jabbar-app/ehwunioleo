<div class="row my-4">
  <div class="col-12">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <div class="card-title mb-0">
          <h3 class="mb-0">Manajemen Data TPS LB3</h3>
          <small class="text-muted">Rute: TPS LB3 menuju Provider.</small>
        </div>
        <a href="{{ route('schedules.create') }}" class="btn btn-primary d-none d-lg-block my-auto py-auto">Tambah Request</a>
        <div class="dropdown d-lg-none d-block">
          <button class="btn p-0" type="button" id="earningReportsId" data-bs-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="ti ti-dots-vertical ti-sm text-muted"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="earningReportsId">
            <a class="dropdown-item" href="{{ route('schedules.create') }}">Tambah Request</a>
            {{-- <a class="dropdown-item" href="javascript:void(0);">Delete</a> --}}
          </div>
        </div>
      </div>
      <div class="card-body table-responsive">
        <table id="processTable" class="table">
          <thead>
            <tr>
              <th>Jenis Limbah</th>
              <th>Tanggal</th>
              <th>Petugas</th>
              <th>Sumber</th>
              <th class="text-center">Jumlah</th>
              <th>Pack</th>
              {{-- <th>Tujuan</th> --}}
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($processes as $process)
              <tr
                @if (Auth::user()->role == 'Super Admin') onclick="location.href='{{ $process->status == 'Approved' ? route('schedule.set', $process->id) : route('schedule.complete', $process->id) }}'"
                style="cursor: pointer;" @endif>
                <td>
                  <div class="d-flex align-items-center">
                    <div class="flex-grow-0">
                      <p class="mb-0 text-nowrap">{{ $process->waste_name }}</p>
                      <small class="text-muted">{{ $process->waste_code }}</small>
                    </div>
                  </div>
                </td>
                <td class="text-nowrap">{{ $process->date }}</td>
                <td>{{ $process->user_name }}</td>
                <td>{{ $process->source }}</td>
                <td class="text-center">{{ $process->amount }}</td>
                <td><span>{{ $process->packaging }}</span></td>
                <td>
                  @if ($process->status == 'Approved')
                    <div class="btn btn-sm rounded-pill btn-info waves-effect waves-light">On TPS LB3</div>
                  @else
                    <div class="text-primary fw-bold">{{ $process->status }}</div>
                    <small><span class="text-muted"> to </span>{{ $process->dispose_to }}</small>
                  @endif
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@push('scripts')
  <script>
    $(document).ready(function() {
      $('#processTable').DataTable({
        "order": [
          [1, 'desc']
        ]
      });
    });
  </script>
@endpush
