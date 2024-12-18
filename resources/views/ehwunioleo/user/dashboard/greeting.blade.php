<div class="card profile-greeting">
  <div class="card-body">
    <div class="d-sm-flex d-block justify-content-between">
      <h4 class="mobile-mb-24"><a href="/profile"><span>Selamat datang, </span>{{ Auth::user()->name }}</a> <span class="right-circle"><i class="fa fa-check-circle font-primary f-14 middle"></i></span></h4>
      <button class="btn btn-lg btn-primary mobile-hide" type="button" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="User role access">{{ Auth::user()->role }}</button>
    </div>
    <div class="greeting-user">
      <a href="/schedule/create" class="btn btn-sm btn-info mobile-hide" style="color: white;">
        <i class="icon-pencil-alt"></i>
        Tambah Data
      </a>
    </div>
  </div>
</div>