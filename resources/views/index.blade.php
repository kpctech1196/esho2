<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>APE</title>
    <link rel="shortcut icon" href="{{asset('assets/img/blog/ap.jpg')}}" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
          <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
          <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/min.css')}}">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/owl.theme.default.css')}}">
    <script src="{{asset('assets/js/min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" ></script>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/ape-owl.css')}}">       

</head>
<body >
    <div class="containe">
    	{{View::make('header')}}
          @yield('email')
         
          @yield('cart')
          @yield('itmedetails')
          @yield('topnav')
          @yield('carousal')
          @yield('Dils_of_days')
          @yield('tv')
          @yield('laptop')
          @yield('mobile')
          @yield('bigvew_carousal')
          @yield('Kitchen')          
          @yield('oiran')
          @yield('bulb')          
          @yield('speaker')
          @yield('refrigerat')
          <!-- buynow information  -->
          @yield('bynow')
         <!-- Checkout page -->
         @yield('checkout')
         <!-- case on delivery -->
         @yield('caseondelivery')
          <!-- category -->
          <!-- User_account -->
          @yield('User_account')
          @yield('viewmore')
          @yield('script')

    	{{View::make('footer')}}
    </div>
</body>
</html>