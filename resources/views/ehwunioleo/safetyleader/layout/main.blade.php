<!DOCTYPE html>
<html lang="en">

@include('ehwunioleo.safetyleader.layout.header')

<body>
  @include('ehwunioleo.safetyleader.layout.loadertop')

  <div class="page-wrapper compact-wrapper" id="pageWrapper">
    @include('ehwunioleo.layout.pageheader')

    <div class="page-body-wrapper">
      @include('ehwunioleo.safetyleader.layout.sidebar')
      @yield('body')
      @include('ehwunioleo.safetyleader.layout.footer')
    </div>

  </div>

  @yield('js')
</body>

</html>