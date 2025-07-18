<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <!-- Meta Tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="keywords" content="Site keywords here">
		<meta name="description" content="">
		<meta name='copyright' content=''>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Title -->
        <title>AIME</title>
		
		<!-- Favicon -->
        <link rel="icon" href="{{ asset ('template/img/logo.png')}}">
		
		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{ asset('template/css/bootstrap.min.css') }}">
		<!-- Nice Select CSS -->
		<link rel="stylesheet" href="{{ asset('template/css/nice-select.css') }}">
		<!-- Font Awesome CSS -->
		<link rel="stylesheet" href="{{ asset('template/css/font-awesome.min.css') }}">
		<!-- icofont CSS -->
		<link rel="stylesheet" href="{{ asset('template/css/icofont.css') }}">
		<!-- Slicknav -->
		<link rel="stylesheet" href="{{ asset('template/css/slicknav.min.css') }}">
		<!-- Owl Carousel CSS -->
		<link rel="stylesheet" href="{{ asset('template/css/owl-carousel.css') }}">
		<!-- Datepicker CSS -->
		<link rel="stylesheet" href="{{ asset('template/css/datepicker.css') }}">
		<!-- Animate CSS -->
		<link rel="stylesheet" href="{{ asset('template/css/animate.min.css') }}">
		<!-- Magnific Popup CSS -->
		<link rel="stylesheet" href="{{ asset('template/css/magnific-popup.css') }}">

		<!-- Medipro CSS -->
		<link rel="stylesheet" href="{{ asset('template/css/normalize.css') }}">
		<link rel="stylesheet" href="{{ asset('template/style.css') }}">
		<link rel="stylesheet" href="{{ asset('template/css/responsive.css') }}">

    </head>
    <body>
		{{-- preloader --}}
		<div id="preloader">
			<div class="door left-door"></div>
			<div class="door right-door"></div>
		  </div>

		<!-- Header Area -->
		@include('layouts.header')

		<!-- End Header Area -->
		
        @yield('content')
		@stack('scripts')


		<!-- Footer Area -->
		@include('layouts.footer')

		<!--/ End Footer Area -->
		
		<!-- jquery Min JS -->
		<script src="{{ asset('template/js/jquery.min.js') }}"></script>
		<!-- jquery Migrate JS -->
		<script src="{{ asset('template/js/jquery-migrate-3.0.0.js') }}"></script>
		<!-- jquery Ui JS -->
		<script src="{{ asset('template/js/jquery-ui.min.js') }}"></script>
		<!-- Easing JS -->
		<script src="{{ asset('template/js/easing.js') }}"></script>
		<!-- Color JS -->
		<script src="{{ asset('template/js/colors.js') }}"></script>
		<!-- Popper JS -->
		<script src="{{ asset('template/js/popper.min.js') }}"></script>
		<!-- Bootstrap Datepicker JS -->
		<script src="{{ asset('template/js/bootstrap-datepicker.js') }}"></script>
		<!-- Jquery Nav JS -->
		<script src="{{ asset('template/js/jquery.nav.js') }}"></script>
		<!-- Slicknav JS -->
		<script src="{{ asset('template/js/slicknav.min.js') }}"></script>
		<!-- ScrollUp JS -->
		<script src="{{ asset('template/js/jquery.scrollUp.min.js') }}"></script>
		<!-- Niceselect JS -->
		<script src="{{ asset('template/js/niceselect.js') }}"></script>
		<!-- Tilt Jquery JS -->
		<script src="{{ asset('template/js/tilt.jquery.min.js') }}"></script>
		<!-- Owl Carousel JS -->
		<script src="{{ asset('template/js/owl-carousel.js') }}"></script>
		<!-- counterup JS -->
		<script src="{{ asset('template/js/jquery.counterup.min.js') }}"></script>
		<!-- Steller JS -->
		<script src="{{ asset('template/js/steller.js') }}"></script>
		<!-- Wow JS -->
		<script src="{{ asset('template/js/wow.min.js') }}"></script>
		<!-- Magnific Popup JS -->
		<script src="{{ asset('template/js/jquery.magnific-popup.min.js') }}"></script>
		<!-- Counter Up CDN JS (tetap pakai link CDN) -->
		<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
		<!-- Bootstrap JS -->
		<script src="{{ asset('template/js/bootstrap.min.js') }}"></script>
		<!-- Main JS -->
		<script src="{{ asset('template/js/main.js') }}"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"></script>


    </body>
</html>