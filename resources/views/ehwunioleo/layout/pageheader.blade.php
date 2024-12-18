<div class="page-header">
  <div class="header-wrapper row m-0">
    <form class="form-inline search-full col" action="#" method="get">
      <div class="form-group w-100">
        <div class="Typeahead Typeahead--twitterUsers">
          <div class="u-posRelative">
            <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search Tivo .." name="q" title="" autofocus>
            <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div><i class="close-search" data-feather="x"></i>
          </div>
          <div class="Typeahead-menu"></div>
        </div>
      </div>
    </form>
    <div class="header-logo-wrapper col-auto p-0">
      <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
      <div class="logo-header-main"><a href="dashboard"><img class="img-fluid for-light img-100" src="/assets/images/logo/EHWM_logo.png" alt=""><img class="img-fluid for-dark" src="/assets/images/logo/logo.png" alt=""></a></div>
    </div>
    <div class="left-header col horizontal-wrapper ps-0">
      @if(Auth::user()->role == 'Super Admin')
      <div class="left-menu-header">
        <ul class="header-left">
          <li class="onhover-dropdown"><span class="f-w-600">Dashboard</span><span><i class="middle" data-feather="chevron-down"></i></span>
            <ul class="onhover-show-div left-dropdown">
              <li> <a href="/dashboard">Dashboard</a></li>
              <li> <a href="/dashboard#tasks">My Tasks</a></li>
            </ul>
          </li>
          <li class="onhover-dropdown"><span class="f-w-600">Data Management</span><span><i class="middle" data-feather="chevron-down"></i></span>
            <ul class="onhover-show-div left-dropdown">
              <li><a href="/schedule">Penjadwalan</a></li>
              <li><a href="/reports">Reports</a></li>
              <li><a href="/waste">TPS LB3</a></li>
            </ul>
          </li>
          <li class="onhover-dropdown">
            <span class="f-w-600">Manage Users</span>
            <span><i class="middle" data-feather="chevron-down"></i></span>
            <ul class="onhover-show-div left-dropdown">
              <li><a href="/users">All Users</a></li>
              <li><a href="/users/add">Add New User</a></li>
            </ul>
          </li>
        </ul>
      </div>
      @endif
    </div>
    <div class="nav-right col-6 pull-right right-header p-0">
      <ul class="nav-menus">
        <li></li>
        <li>
          <div class="mode"><i class="fa fa-moon-o"></i></div>
        </li>
        <li class="maximize"><a href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize-2"></i></a></li>
        <li class="profile-nav onhover-dropdown">
          <div class="account-user"><i data-feather="user"></i></div>
          <ul class="profile-dropdown onhover-show-div">
            <li><a href="/profile"><i data-feather="user"></i><span>Profil</span></a></li>
            @if(Auth::user()->role=="Super Admin")
            <li><a href="/settings"><i data-feather="settings"></i><span>Pengaturan</span></a></li>
            @endif
            <li>
              <a href="#" onclick="logout()"><i data-feather="power"> </i><span>Logout</span></a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </div>
    <script class="result-template" type="text/x-handlebars-template">
      <div class="ProfileCard u-cf">                        
        <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
          <div class="ProfileCard-details">
            <div class="ProfileCard-realName">{{ $name ?? '' }}</div>
          </div>
        </div>
      </script>
    <script class="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
  </div>
</div>