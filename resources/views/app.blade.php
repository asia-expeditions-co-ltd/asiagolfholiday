<!DOCTYPE html>
<html>
<head>

	<title>asiagolfholiday.com</title>
  <link rel="icon" href="http://www.asiagolfholiday.com/img/Icon-asiagolfholiday.png" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="{{asset('/css/app.css')}}">
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
	@if(isset($home))
    <title>| Asia Golf Holiday</title>
    <meta name="keywords"
          itemprop="keywords"
          content="Asia Golf Holiday, Golf Destinations, Golf Club, Golf Packages, Golf Cambodia, Golf Myanmar, Golf Thailand, Golf Vietname, Indo China Golf, Golf Asian">
    <meta name="description" 
          content="Asia Golf Holiday destinations to visit and have lot of golf courses and include golf Package, Golf Tours ">
    @elseif(isset($urlname))
    <title>Destinations | Asia Golf Holiday</title>
    <meta name="keywords"
          itemprop="keywords" 
          content="Asia Golf Holiday, Golf in {{$urlname}}">
    <meta name="description" 
          content="destinations to visit and have lot of golf courses"> 
    @elseif(isset($GolfCourses))
    <title> Golf Courses | Asia Golf Holiday</title>
    <meta name="keywords"
          itemprop="keywords" 
          content="Asia Golf Holiday, Golf Courses">
    <meta name="description" 
          content="Golf Courses"> 
    @elseif(isset($GolfPackages))
    <title> Golf Packages | Asia Golf Holiday</title>
    <meta name="keywords"
          itemprop="keywords"
          content="Asia Golf Holiday, Tour Packages">
    <meta name="description"
          content="Tour Packages">
    @else
    <title> Contact Us | Asia Golf Holiday</title>
    <meta name="keywords"
          itemprop="keywords"
          content="Asia Golf Holiday, Contact Us">
    <meta name="description"
          content="Contact Us">
    @endif
    
    @if(isset($slug))
    <?php
          $data        = DB::table('golf_packages')->where('golf_slug',$slug)->first();
          $url         = 'http://www.asiagolfholiday.com/golf-item/'.$data->golf_slug;
          $title       = $data->golf_name;
          $description = $data->desc;
          $image       = 'http://www.asiagolfholiday.com/photos/share/'.$data->picture;
    ?>
      <meta property="og:url"
            content='{{$url}}' />
      <meta property="og:title"
            content='{{$title}}' />
      <meta property="og:description"
            content='{{strip_tags($title)}}' />
      <meta property="og:image"
            content='{{$image}}' />
      <meta property="twitter:card"
            content="summary_large_image" />
      <meta property="twitter:site"
            content='{{$url}}' />
      <meta property="twitter:title"
            content='{{$title}}' />
      <meta property="twitter:description"
            content='{{strip_tags($title)}}' /> 
      <meta property="twitter:creator"
            content="tak me to burma" />
      <meta property="twitter:image:src"
            content='{{$image}}' />
      <meta property="twitter:domain"
            content="http://www.asiagolfholiday.com/" />
    @endif  
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Alex+Brush" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/lib/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/lib/css/animate.css')}}">    
    <link rel="stylesheet" href="{{asset('/lib/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('/lib/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('/lib/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('/lib/css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('/lib/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('/lib/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('/lib/css/jquery.timepicker.css')}}">    
    <link rel="stylesheet" href="{{asset('/lib/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('/lib/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('/lib/css/style.css')}}">
    <style type="text/css">

		.p-t{
			padding: 10px !important
		}
		.add{
			display: none!important;
		}
		.lay-change{
			float: left;
			padding: 0px!important;

		}
		.ftco-animate{
			opacity: 1;
			visibility:unset;
		}
		.img-back{
			position: inherit;
			width: 100%;
			height: 555px;
			background-size: cover;
		    background-repeat: no-repeat;
		    background-position: center center;
		}
		.navbar-nav li:hover > .dropdown-menu {
			display: block;
			z-index: 3;
		}
		.fields .form-group textarea.form-control{
			height: 125px!important;
		}
		.ftco-footer .ftco-footer-widget ul li a span.icon-twitter:hover{
			font-size: 38px;
			transition: .5s;
			color: #007bff;
		}
		.ftco-footer .ftco-footer-widget ul li a span.icon-facebook:hover{
			font-size: 38px;
			transition: .5s;
			color: #29B6F6;
		}
		.ftco-footer .ftco-footer-widget ul li a span.icon-instagram:hover{
			font-size: 38px;
			transition: .5s;
			color: #E91E63;
		}
    .react-datepicker-wrapper{
      width: 100%;
    }
    .ftco-navbar-light{
      position: fixed;
      background-color: #ffffff!important;
      top:0!important;
    }
    .ftco-navbar-light .navbar-nav > .nav-item > .nav-link{
      color:#000000;
      font-weight: 500;

    }
    .ftco-navbar-light .navbar-nav > .nav-item > .nav-link:hover{
      color: #4ac107;
    }
    .ftco-navbar-light .navbar-toggler{
      color: rgba(0, 0, 0, 0.5) !important;
    }
	</style>

</head>
<body>

	<div id="app"></div>

	<script src="{{asset('/lib/js/jquery.min.js')}}"></script>
	<script src="{{asset('/lib/js/jquery-migrate-3.0.1.min.js')}}"></script>
	<script src="{{asset('/lib/js/popper.min.js')}}"></script>
	<script src="{{asset('/lib/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('/lib/js/jquery.easing.1.3.js')}}"></script>
	<script src="{{asset('/lib/js/jquery.waypoints.min.js')}}"></script>
	<script src="{{asset('/lib/js/jquery.stellar.min.js')}}"></script>
	<script src="{{asset('/lib/js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('/lib/js/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{asset('/lib/js/aos.js')}}"></script>
	<script src="{{asset('/lib/js/jquery.animateNumber.min.js')}}"></script>
	<script src="{{asset('/lib/js/bootstrap-datepicker.js')}}"></script>
	<!-- <script src="/lib/js/jquery.timepicker.min.js"></script> -->
	<script src="{{('/lib/js/scrollax.min.js')}}"></script>
	<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script> -->
	<!-- <script src="/lib/js/google-map.js"></script> -->
	<script src="{{asset('/lib/js/main.js')}}"></script>
	<script src="{{asset('/js/app.js')}}"></script>
</body>
</html>