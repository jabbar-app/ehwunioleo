<div class="col-12">
  <div class="card best-seller">
    <div class="card-header pb-0">
      <h4 style="color: #1766A6" class="mb-5 f-26">Status Request Limbah Masuk TPS LB3</h4>
      <div class="d-flex justify-content-between">
        <div class="flex-grow-1">
          <p><span class="badge badge-light-info f-14">Rute: </span> Plant Menuju TPS LB3</p>
        </div>
      </div>
    </div>
    <div class="card-body pt-0">
      @if($requests=="[]")
      <div class="alert alert-info dark" role="alert">
        <p class="text-white">Belum ada request pengangutan Limbah menuju TPS LB3!</p>
      </div>
      @else
      <div class="table-responsive">
        <table class="table table-bordernone">
          <thead>
            <tr>
              <th class="f-20">Jenis Limbah</th>
              <th>Tanggal</th>
              <th>Jumlah</th>
              <th>Sumber</th>
              <th>Petugas</th>
              <th style="text-align: left;">Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach($requests as $r)
            <tr>
              <td>
                <div class="d-flex align-items-center">
                  <div class="flex-shrink-0"><img class="img-fluid" src="{{ asset('assets/images/uploads/truck.png') }}" width="48px" alt=""></div>
                  <div class="flex-grow-1"><span class="f-14 f-w-600">{{ $r->waste_name }}</span>
                    <p class="mb-0">{{ $r->waste_code }}</p>
                  </div>
                  <div class="active-status active-online"></div>
                </div>
              </td>
              <td><?php echo date('d F Y', strtotime($r->date)); ?></td>
              <td><span>{{ $r->amount }}</span> {{ $r->packaging }}</td>
              <td>{{ $r->source }}</td>
              <td>{{ $r->user_name }}</td>
              <td style="text-align: left;">
                @if(Auth::user()->role != 'User' && Auth::user()->role != 'Admin')
                <a href="{{ route('schedule.detail', $r->id) }}">
                  <div class="btn btn-xs btn-dark">
                    {{ $r->status }}
                  </div>
                </a>
                @else
                @if(Auth::user()->id == $r->user_id)
                <a href="{{ route('schedule.resubmit', $r->id) }}">
                  <div class="btn btn-xs btn-warning">
                    {{ $r->status }}
                  </div>
                </a>
                @else
                <button class="btn btn-xs btn-warning" disabled> {{ $r->status }}</button>
                @endif
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      @endif
    </div>
  </div>
</div>