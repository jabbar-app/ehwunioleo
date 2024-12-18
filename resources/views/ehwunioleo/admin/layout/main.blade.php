<!DOCTYPE html>
<html lang="en">

@include('ehwunioleo.admin.layout.header')

<body>
  @include('ehwunioleo.admin.layout.loadertop')

  <div class="page-wrapper compact-wrapper" id="pageWrapper">
    @include('ehwunioleo.layout.pageheader')

    <div class="page-body-wrapper">
      @include('ehwunioleo.admin.layout.sidebar')
      @yield('body')
      @include('ehwunioleo.admin.layout.footer')
    </div>

  </div>

  @yield('js')
</body>

</html>