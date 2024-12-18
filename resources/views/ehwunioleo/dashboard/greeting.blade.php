<div class="card profile-greeting">
  <div class="card-body">
    <div class="d-sm-flex d-block justify-content-between">
      <h4 class="mobile-mb-24"><a href="/profile"><span>Selamat datang, </span>{{ Auth::user()->name }}</a> <span class="right-circle"><i class="fa fa-check-circle font-primary f-14 middle"></i></span></h4>
      <div class="alert alert-light mobile-hide">{{ Auth::user()->role }}</div>
    </div>
    @if(Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Safety Leader')
    <div class="greeting-user">
      <?php
      $count = 0;
      foreach ($schedules as $p) {
        $count++;
      }
      ?>
      <a href="#tasks"><span class="badge badge-primary f-14">{{ $count }}</span><span class="font-primary f-16 middle f-w-500 ms-2">request aktif</span></a>
    </div>
    @endif
  </div>
</div>