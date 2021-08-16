<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>APE</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/min.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/owl.theme.default.css')}}">
    <script src="{{asset('assets/js/min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/ape-owl.css')}}">       

</head>
<body >
    <div class="containe">
      {{View::make('admin.header')}} 
        <!-- master apge -->
        @yield('emailtest')
        @yield('admin_account')
        @yield('dashbord')
         @yield('loginform')
         @yield('available_stocks')
         @yield('form-control')
         @yield('stock')
         @yield('user_profile')
         @yield('order')
      {{View::make('admin.footer')}}
    </div>
</body>
</html>