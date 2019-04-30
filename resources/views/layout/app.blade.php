<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="/img/Icon-asiagolfholiday.png" type="image/x-icon" />
	<title>@yield('title') | {{config('app.title')}}</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css')}}">
	<script type="text/javascript" src="{{ asset('js/app.js')}}"></script>
	<script type="text/javascript" src="{{ asset('js/custom.js')}}"></script>
	<script type="text/javascript">
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11&appId=893916190733237";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
	</script>
	
</head>
<body>
	@yield('content')
</body>
</html>