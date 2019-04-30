<?php 
use App\component\Content;
?>
<div class="col-md-6">
	<h1><strong>Our Sample Golf Packages</strong></h1>
	<h6 style="color: #7e9d10!important;">Unique Construction</h6>
	<div><p>EXTENSIVE UPGRADES AND THOROUGH MAINTENANCE HAVE MADE OUR GOLF FIELDS A MODERN COMFORTABLE PLACE FOR TRAININGS</p></div><br>
	<ul class="list-unstyled liststyle-li"> 
		<li><i class="fa fa-check-circle-o"></i> No daily water usage</li>
		<li><i class="fa fa-check-circle-o"></i> Not affected by freezing weather</li>
		<li><i class="fa fa-check-circle-o"></i> 3 Distinct golf fields surface speed-of-play options</li>
		<li><i class="fa fa-check-circle-o"></i> Adjustable golf field speeds that are great for serves</li>
	</ul>
</div>	
<?php 
	$getGolf = \App\GolfPackage::orderBy('id', 'DESC')->take(24)->get();
?>
<div class="col-md-6">
	<div id="carousel-example-golf" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators item-point">
			@foreach($getGolf as $key => $icon)
				<li data-target="#carousel-example-golf" data-slide-to="{{$key}}" class="{{$key == 0 ? 'active':''}}"></li>
			@endforeach			
		</ol>
		<div class="carousel-inner">
			@foreach($getGolf as $key => $golf)
			<div class="item {{$key == 0 ? 'active':''}}">
				<img style="width: 100%;" src="{{Content::urlImage($golf->picture, 'photos/share/thumbs')}}" alt="{{$golf->golf_name}}">
				<div class="carousel-caption" style="margin-bottom: 50px;">
					<a href="/{{{ $golf->country->country_slug or ''}}}/{{{ $golf->province->slug or ''}}}/{{ $golf->golf_slug}}"><h5 >{{$golf->golf_name}}</h5></a>
				</div>
			</div>			
			@endforeach
		</div>		
		<a class="left carousel-control slideCarousel" href="#carousel-example-golf" data-slide="prev">
				<!-- <span class="glyphicon glyphicon-chevron-left"></span> -->
		</a>
		<a class="right carousel-control slideCarousel" href="#carousel-example-golf" data-slide="next">
			<!-- <span class="glyphicon glyphicon-chevron-right"></span> -->
		</a>	
	</div>
</div>