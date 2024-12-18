<div class="sidebar-wrapper" style="background: #1665A5;">
  <div>
    <div class="logo-wrapper">
      <a href="/dashboard"><img class="img-fluid for-light" src="/assets/uploads/img/logo_ehwm.png" style="width: 65%; margin-top: 15px;" alt="EWHM"></a>
      <div class="back-btn"><i data-feather="grid"></i></div>
      <div class="toggle-sidebar icon-box-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
    </div>
    <div class="logo-icon-wrapper">
      <a href="/dashboard">
        <div class="icon-box-sidebar"><i data-feather="grid"></i></div>
      </a>
    </div>

    <nav class="sidebar-main">
      <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
      <div id="sidebar-menu">
        <ul class="sidebar-links" id="simple-bar">
          <li class="back-btn">
            <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
          </li>
          <li class="menu-box">
            <ul>
              <li class="sidebar-list">
                <a class="sidebar-link sidebar-title link-nav @if($title == 'Dashboard') link-nav-active @endif" href="/dashboard"><i data-feather="monitor"> </i><span>Dashboard</span></a>
              </li>
              <li class="sidebar-list">
                <a class="sidebar-link sidebar-title link-nav @if($title == 'Reports') link-nav-active @endif" href="/reports"><i data-feather="layout"></i><span>Reports</span></a>
              </li>
              <li class="sidebar-list">
                <a class="sidebar-link sidebar-title link-nav @if($title == 'Limbah B3') link-nav-active @endif" href="/waste"><i data-feather="box"></i><span>Limbah B3</span></a>
              </li>
              <li class="sidebar-list">
                <a class="sidebar-link sidebar-title link-nav @if($title == 'Penjadwalan') link-nav-active @endif" href="/schedule"><i data-feather="calendar"> </i><span>Penjadwalan</span></a>
              </li>

              <li class="sidebar-list">
                <a class="sidebar-link sidebar-title link-nav @if($title == 'Info 3P') link-nav-active @endif" href="/provider"><i data-feather="box"> </i><span>Info 3P</span></a>
              </li>

              <li class="sidebar-list @if($title == 'Pengaturan') link-nav-active @endif">
                <a class="sidebar-link sidebar-title link-nav" href="/settings"><i data-feather="edit"></i><span>Pengaturan</span></a>
              </li>

              <li class="sidebar-list">
                <a class="sidebar-link sidebar-title @if($title == 'Users') link-nav-active @endif" href="javascript:void(0)"><i data-feather="git-pull-request"></i><span>Users</span>
                </a>
                <ul class="sidebar-submenu">
                  <li><a href="/users">All Users</a></li>
                  <li><a href="/users/add">Add New Users</a></li>
                </ul>
              </li>

              <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="https://chatting.page/bsbbpzn4jetdx6igbxrtwpztwaq1nugj" target="_blank"><i data-feather="users"> </i><span>Help & Support</span></a></li>

              <li class="sidebar-list">
                <a class="sidebar-link sidebar-title link-nav @if($title == 'Profil') link-nav-active @endif" href="/profile"><i data-feather="users"> </i><span>Profil</span></a>
              </li>

              <li class="sidebar-list">
                <a class="sidebar-link sidebar-title link-nav" href="#" onclick="logout()">
                  <i data-feather="power"> </i><span>Logout</span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </li>
            </ul>
      </div>
      <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
    </nav>
  </div>
</div>