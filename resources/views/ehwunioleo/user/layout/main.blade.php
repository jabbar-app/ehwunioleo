<!DOCTYPE html>
<html lang="en">

@include('ehwunioleo.user.layout.header')

<body>
  @include('ehwunioleo.user.layout.loadertop')

  <div class="page-wrapper compact-wrapper" id="pageWrapper">
    @include('ehwunioleo.layout.pageheader')

    <div class="page-body-wrapper">
      @include('ehwunioleo.user.layout.sidebar')
      @yield('body')
      @include('ehwunioleo.user.layout.footer')
    </div>

  </div>

  @yield('js')
</body>

</html>