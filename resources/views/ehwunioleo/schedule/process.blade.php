<div class="row">
  <div class="col-lg-12 col-md-12 box-col-12">
    <div class="card best-seller">
      <div class="card-header pb-0">
      <h4 style="color: #1766A6" class="mb-5 f-26">Status Kelola Limbah Keluar TPS LB3</h4>
        <div class="d-flex justify-content-between">
          <div class="flex-grow-1">
            <p><span class="badge badge-light-info f-14">Rute: </span> TPS LB3 menuju 3<sup>rd</sup> Party</p>
          </div>
        </div>
      </div>
      <div class="card-body pt-0">
        @if($process=="[]")
          <div class="alert alert-info dark" role="alert">
            <p class="text-white">Belum ada data Limbah yang tercatat di TPS LB3!</p>
          </div>
        @else
          <div class="table-responsive">
            <table class="table table-bordernone">
              <thead>
                <tr>
                  <th class="f-20">Jenis Limbah</th>
                  <th>Tanggal</th>
                  <th>Petugas</th>
                  <th>Sumber</th>
                  <th>Jumlah</th>
                  <th>Pack</th>
                  <th>Tujuan</th>
                  <th class="text-center">Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach($process as $p)
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="flex-grow-0"><span class="f-14 f-w-600">{{ $p->waste_name }}</span>
                        <p class="mb-0">{{ $p->waste_code }}</p>
                      </div>
                    </div>
                  </td>
                  <td><?php echo date('d F Y', strtotime($p->date)); ?></td>
                  <td>{{ $p->user_name }}</td>
                  <td>{{ $p->source }}</td>
                  <td><span>{{ $p->amount }}</span></td>
                  <td><span>{{ $p->packaging }}</span></td>
                  <td><span>{{ $p->dispose_to }}</span></td>
                  <td>
                    @if(Auth::user()->role == "Super Admin")
                      @if($p->status=='Approved')
                        <a href="{{ route('schedule.set', $p->id) }}" class="btn btn-sm btn-info" style="width: 140px;">On TPS LB3</a>
                      @else
                        <a href="{{ route('schedule.complete', $p->id) }}" class="btn btn-sm btn-primary" style="width: 140px;">{{ $p->status }}</a>
                      @endif
                    @else
                      @if($p->status=='Approved')
                        <button class="btn btn-sm btn-info" style="width: 140px;" disabled>On TPS LB3</button>
                      @else
                        <button class="btn btn-sm btn-primary" style="width: 140px;" disabled>{{ $p->status }}</button>
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
</div>