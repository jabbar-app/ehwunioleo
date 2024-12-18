<div class="card profile-greeting">
  <div class="card-body">
    <div class="d-sm-flex d-block justify-content-between">
      <h4 class="mobile-mb-24"><a href="/profile"><span>Selamat datang, </span>{{ Auth::user()->name }}</a> <span class="right-circle"><i class="fa fa-check-circle font-primary f-14 middle"></i></span></h4>
      <button class="btn btn-lg btn-primary mobile-hide" type="button" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="User role access">{{ Auth::user()->role }}</button>
    </div>
    <div class="greeting-user">
      <?php
      $count = 0;
      foreach ($schedules as $p) {
        $count++;
      }
      ?>
      <a href="#tasks"><span class="badge badge-primary f-14">{{ $count }}</span><span class="font-primary f-16 middle f-w-500 ms-2">request aktif</span></a>
    </div>
  </div>
</div>