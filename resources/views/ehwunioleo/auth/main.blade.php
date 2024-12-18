<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="EHWM by UNIOLEO">
  <meta name="author" content="unioleo">

  <link rel="icon" href="{{ asset('assets/uploads/img/favicon.png') }}" type="image/x-icon">

  <title>{{ $title }}</title>
  
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/bootstrap.css') }}">

  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
  <link rel="stylesheet" type="text/css" href="/assets/css/ehwunioleo.css">
</head>

<body>
  <div class="row">
    <div class="col-xl-12 p-0">
      @yield('form')
    </div>
  </div>
    
  
  <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>