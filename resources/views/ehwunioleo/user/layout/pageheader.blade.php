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
      <div class="left-menu-header">
        <!-- <ul class="app-list">
          <li class="onhover-dropdown">
            <div class="app-menu"> <i data-feather="folder-plus"></i></div>
            <ul class="onhover-show-div left-dropdown">
              <li> <a href="file-manager.html">File Manager</a></li>
              <li> <a href="kanban.html"> Kanban board</a></li>
              <li> <a href="social-app.html"> Social App</a></li>
              <li> <a href="bookmark.html"> Bookmark</a></li>
            </ul>
          </li>
        </ul> -->
      </div>
    </div>
    <div class="nav-right col-6 pull-right right-header p-0">
      <ul class="nav-menus">
        <li>
          <div class="right-header ps-0">
            <div class="input-group">
              <!--<div class="input-group-prepend"><span class="input-group-text mobile-search"><i class="fa fa-search"></i></span></div>-->
              <!--<input class="form-control" type="text" placeholder="">-->
            </div>
          </div>
        </li>
        <li class="serchinput">
          <div class="serchbox"><i data-feather="search"></i></div>
          <div class="form-group search-form">
            <input type="text" placeholder="">
          </div>
        </li>
        <li>
          <div class="mode"><i class="fa fa-moon-o"></i></div>
        </li>
        <li class="maximize"><a href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize-2"></i></a></li>
        <li class="profile-nav onhover-dropdown">
          <div class="account-user"><i data-feather="user"></i></div>
          <ul class="profile-dropdown onhover-show-div">
            <li><a href="/profile"><i data-feather="user"></i><span>Account</span></a></li>
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