<div class="col-12">
  <div class="card profile-greeting">
    <div class="card-body">
      <div class="d-sm-flex d-block justify-content-between">
        <h4 style="color: #1766A6;" class="mobile-mb-24 f-26 mb-4">Infomasi Jadwal Pengangkutan di UOI</h4>
        @if(Auth::user()->role != "Safety Leader")
        <a href="/schedule/create" class="btn btn-lg btn-primary mobile-mb-24 mb-4">Tambah Data</a>
        @endif
      </div>
      <div class="greeting-user">
        <?php
        $count_tps = 0;
        $count_3p = 0;
        foreach ($schedules as $p) {
          if ($p->step == 0) {
            $count_tps++;
          }
        }
        foreach ($schedules as $p) {
          if ($p->step == 1) {
            $count_3p++;
          }
        }
        ?>
        <p><span class="badge badge-primary f-14">{{ $count_tps }}</span><span class="font-primary f-16 middle f-w-500 ms-2">menuju TPS LB3</span></p>
        <p><span class="badge badge-primary f-14">{{ $count_3p }}</span><span class="font-primary f-16 middle f-w-500 ms-2">menuju 3<sup>rd</sup> Party</span></p>

      </div>
    </div>
  </div>
</div>