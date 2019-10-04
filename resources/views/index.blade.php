@extends('layout.app')
@section('title', '')

@section('keywords', 'Asia Golf Holiday, Golf Destinations, Golf Travel, Golf in Cambodia, Golf in Myanmar')

@section('description', 'Asia Golf Holiday destinations to visit and have lot of golf courses')
<?php 
use App\component\Content;
?>
@section('content')
@widget('menu')
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="height: 60px;"></div>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs=12" style="height: 60px;"></div>
@widget('slide_show')
<div class="container">
	<div class="col-md-12">
		<div class="section-welcome">
			&nbsp;<span class="fa fa-map-pin" style="color: green; font-size: 27px;"></span> &nbsp; JOIN WITH US TO PLAY GOLF TODAY  
		</div>	
    </div>
</div>
<div class="container">
	@widget('GolfClub')
</div>
<div style="margin-top: 50px;"></div>
<div class="title-section">
	<div class="container">
		<div class="col-mg-12">
			@widget('golf_package')
		</div>
	</div>
</div>
<!-- our activities  -->
<div class="title-section">
	<div class="container">
		<div class="col-mg-12">
			@widget('our_activities')			
		</div>
	</div>
</div>
<br><br>
<div class="3w-margin-top"></div>
@include('include.footer')
@endsection