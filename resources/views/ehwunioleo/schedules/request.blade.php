<div class="row my-4">
  <div class="col-12">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <div class="card-title mb-0">
          <h3 class="mb-0">Manajemen Request TPS LB3</h3>
          <small class="text-muted">Rute: Plant menuju TPS LB3.</small>
        </div>
        <div class="dropdown">
          <button class="btn p-0" type="button" id="earningReportsId" data-bs-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="ti ti-dots-vertical ti-sm text-muted"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="earningReportsId">
            <a class="dropdown-item" href="javascript:void(0);">View More</a>
            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
          </div>
        </div>
      </div>
      <div class="card-body table-responsive">
        <table id="requestsTable" class="table">
          <thead>
            <tr>
              <th>Jenis Limbah</th>
              <th>Tanggal</th>
              <th>Petugas</th>
              <th>Sumber</th>
              <th class="text-center">Jumlah</th>
              <th>Pack</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($requests as $request)
              <tr>
                <td>
                  <div class="d-flex align-items-center">
                    <div class="flex-grow-0">
                      <p class="mb-0 text-nowrap">{{ $request->waste_name }}</p>
                      <small class="text-muted">{{ $request->waste_code }}</small>
                    </div>
                  </div>
                </td>
                <td class="text-nowrap">{{ $request->date }}</td>
                <td>{{ $request->user_name }}</td>
                <td>{{ $request->source }}</td>
                <td class="text-center">{{ $request->amount }}</td>
                <td>{{ $request->packaging }}</td>
                <td>
                  @if (Auth::user()->role != 'User' && Auth::user()->role != 'Admin')
                    <a href="{{ route('schedule.detail', $request->id) }}">
                      <div class="btn btn-xs btn-dark">
                        {{ $request->status }}
                      </div>
                    </a>
                  @else
                    @if (Auth::user()->id == $request->user_id)
                      <a href="{{ route('schedule.resubmit', $request->id) }}">
                        <div class="btn btn-xs btn-warning">
                          {{ $request->status }}
                        </div>
                      </a>
                    @else
                      <button class="btn btn-xs btn-warning" disabled> {{ $request->status }}</button>
                    @endif
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
      $('#requestsTable').DataTable({
        "order": [
          [1, 'desc']
        ]
      });
    });
  </script>
@endpush
