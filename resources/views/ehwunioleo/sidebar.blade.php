<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="{{ route('dashboard') }}" class="app-brand-link">
      <span class="app-brand-logo demo">
        <img src="{{ asset('assets/img/u_logo.svg') }}" alt="" class="h-100 w-100">
      </span>
      <span class="app-brand-text demo menu-text fw-bold">Unioleo</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
      <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <!-- Dashboards -->
    <li class="menu-item {{ Route::is('dashboard') ? 'active' : '' }}">
      <a href="{{ route('dashboard') }}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-smart-home"></i>
        <div data-i18n="Dashboard">Dashboard</div>
      </a>
    </li>

    @if (Auth::user()->role == 'Super Admin')
      <li class="menu-item {{ Route::is('reports.index') ? 'active' : '' }}">
        <a href="{{ route('reports.index') }}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-notebook"></i>
          <div data-i18n="Laporan">Laporan</div>
        </a>
      </li>
    @endif

    <li class="menu-item {{ Route::is('wastes.index') ? 'active' : '' }}">
      <a href="{{ route('wastes.index') }}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-recycle"></i>
        <div data-i18n="Limbah B3">Limbah B3</div>
      </a>
    </li>

    @if (Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Safety Leader')
      <li class="menu-item {{ Route::is('schedules.*') ? 'active' : '' }}">
        <a href="{{ route('schedules.index') }}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-calendar"></i>
          <div data-i18n="Penjadwalan">Penjadwalan</div>
        </a>
      </li>
    @endif

    <li class="menu-item {{ Route::is('providers.index') ? 'active' : '' }}">
      <a href="{{ route('providers.index') }}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-building-estate"></i>
        <div data-i18n="Info 3P">Info 3P</div>
      </a>
    </li>

    @if (Auth::user()->role == 'Super Admin')
      <li class="menu-item {{ Route::is('settings.index') ? 'active' : '' }}">
        <a href="{{ route('settings.index') }}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-settings-exclamation"></i>
          <div data-i18n="Pengaturan">Pengaturan</div>
        </a>
      </li>
    @endif

    @if (Auth::user()->role == 'Super Admin')
      <!-- Manajemen User -->
      <li class="menu-header small text-uppercase">
        <span class="menu-header-text" data-i18n="Manajemen User">Manajemen User</span>
      </li>
      <li class="menu-item {{ Route::is('users.*') ? 'active open' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-user-circle"></i>
          <div data-i18n="Kelola User">Kelola User</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item {{ Route::is('users.index') ? 'active' : '' }}">
            <a href="{{ route('users.index') }}" class="menu-link">
              <div data-i18n="Semua Data">Semua Data</div>
            </a>
          </li>
          <li class="menu-item {{ Route::is('users.create') ? 'active' : '' }}">
            <a href="{{ route('users.create') }}" class="menu-link">
              <div data-i18n="Tambah User">Tambah User</div>
            </a>
          </li>
        </ul>
      </li>
    @endif

    <li class="menu-item {{ Route::is('roles') ? 'active' : '' }}">
      <a href="{{ route('roles') }}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-user-check"></i>
        <div data-i18n="Kelola Role">Kelola Role</div>
      </a>
    </li>

    <!-- Profil -->
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text" data-i18n="Manajemen Akun">Manajemen Akun</span>
    </li>
    <li class="menu-item {{ Route::is('profile.edit') ? 'active' : '' }}">
      <a href="{{ route('profile.edit') }}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-user-edit"></i>
        <div data-i18n="Edit Profil">Edit Profil</div>
      </a>
    </li>
    <li class="menu-item">
      <a class="menu-link" href="{{ route('logout') }}"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="ti ti-logout me-2 ti-sm"></i>
        <div data-i18n="Logout">Logout</div>
      </a>
      <!-- Hidden Logout Form -->
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
      </form>
    </li>

    <!-- Dukungan -->
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text" data-i18n="Dukungan">Dukungan</span>
    </li>
    <li class="menu-item">
      <a href="#" target="_blank" class="menu-link">
        <i class="menu-icon tf-icons ti ti-file-description"></i>
        <div data-i18n="Panduan Aplikasi">Panduan Aplikasi</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="https://chatting.page/bsbbpzn4jetdx6igbxrtwpztwaq1nugj" target="_blank" class="menu-link">
        <i class="menu-icon tf-icons ti ti-message-circle"></i>
        <div data-i18n="Tim Teknis">Tim Teknis</div>
      </a>
    </li>
    <div style="margin: 48px 0px;"></div>
  </ul>
</aside>
