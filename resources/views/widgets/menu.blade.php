<div class="container-fluid hidden-xs" id="menu-header-top">
    <ul class="nav navbar-nav">
      	<li><a href="javascript:void(0)"><i class="fa fa-phone"></i>&nbsp; +855 (23) 432 044</a></li>
      	<li><a href="javascript:void(0)"><i class="fa fa-envelope-o"></i>&nbsp; info [at] asiagolfholiday.com </a></li>
    </ul>
   <!--  <ul class="nav navbar-nav navbar-right">
      	<li><a href="#"><span class="glyphicon glyphicon-user"></span> Login</a></li>
      	<li><a href="#"></li>
    </ul> -->
</div>
<div class="clearfix"></div>
<div id="main-menu">
	<nav class="navbar navbar" id="menu-nav">
		<div id="logo">
			<a href="{{url('/')}}">
			  	<img style="width: 25%;" src="{{url('/')}}/img/demo-logo.png">
		  	</a>	
	  	</div>
		<div class="containe-fluid">		
		    <div class="navbar-header">
		      	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			        <span class="glyphicon glyphicon-menu-hamburger"></span>
		      	</button>
		    </div>
		    <div class="collapse navbar-collapse" id="myNavbar">
			    <ul class="nav navbar-nav" id="nav-ul">
			    	<li><a href="{{url('/')}}">Home</a></li>
			        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#ourservice">Destinations</a>
			        	<ul class="dropdown-menu" id="sub-menu">
			        		<span id="triangle-point"></span>
				        	@foreach(\App\Country::where('country_status', 1)->get() as $con)
				        		<li><a href="/{{$con->country_slug}}/golf-courses">{{$con->country_name}}</a></li>
				        	@endforeach
				        </ul>
			        </li>
			        <li><a href="{{route('destination')}}">Golf Packages</a></li>
			        <li><a href="{{route('getActivity')}}">Our Activities</a></li>		       
			        <li><a href="{{route('getContact')}}">Contact Us</a> </li>		        
			    </ul>		   
		    </div>
		</div>
	</nav>
</div>