<!DOCTYPE html>
<html lang="en">

@include('ehwunioleo.layout.header')

<body>
  @include('ehwunioleo.layout.loadertop')

  <div class="page-wrapper compact-wrapper" id="pageWrapper">
    @include('ehwunioleo.layout.pageheader')

    <div class="page-body-wrapper">
      @if(Auth::user()->role=="Super Admin")
      @include('ehwunioleo.layout.sidebar')
      @elseif(Auth::user()->role=="Admin")
      @include('ehwunioleo.admin.layout.sidebar')
      @elseif(Auth::user()->role=="Safety Leader")
      @include('ehwunioleo.safetyleader.layout.sidebar')
      @else
      @include('ehwunioleo.user.layout.sidebar')
      @endif

      @yield('body')
      @include('ehwunioleo.layout.footer')
    </div>

  </div>

  @yield('js')
</body>

</html>