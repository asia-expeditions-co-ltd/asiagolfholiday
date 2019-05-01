<style type="text/css">
	.social:hover {
     -webkit-transform: scale(1.1);
     -moz-transform: scale(1.1);
     -o-transform: scale(1.1);
 }
 .social {
     -webkit-transform: scale(0.8);
     /* Browser Variations: */
     
     -moz-transform: scale(0.8);
     -o-transform: scale(0.8);
     -webkit-transition-duration: 0.5s;
     -moz-transition-duration: 0.5s;
     -o-transition-duration: 0.5s;
 }

/*
    Multicoloured Hover Variations
*/
 
 #social-fb:hover {
     color: #3B5998;
 }
 #social-tw:hover {
     color: #4099FF;
 }
 #social-gp:hover {
     color: #d34836;
 }
 #social-em:hover {
     color: #f39c12;
 }
</style>

<footer class="footer" style="margin-bottom: 0px;">
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-xs-6">
				<address>
	                <strong>Head Office: </strong><br>
	               Asia Golf Holiday<br>Road # 6A, Sangkat Chroy Changvar Chroy Changvar District, 12110 Phnom Penh,, Phnom Penh 12000<br>		                
	                <abbr title="Phone">
	                <i class="fa fa-phone-square"></i>&nbsp;+855 (23) 432 044<br> 
	                <!-- <abbr title="email">Email: -->
	                <i class="fa fa-envelope-o"></i>&nbsp;  info [at] asiagolfholiday.com <br>	
	            </address>	            
			</div>					
			<div class="col-md-7 col-xs-6">
				<div><label><h3>Connect With Us</h3></label></div>
				<div class="col-md-8">
				<div>
					<a href="#"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a>
		            <a href="#"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a>
		            <a href="#"><i id="social-gp" class="fa fa-google-plus-square fa-3x social"></i></a>
	        	</div>
					@if (session('message'))
						<script type="text/javascript"> alert('{{ session("message")}}');</script>
					@endif
					
					<form action="{{route('subscribe')}}" method="post">					              
					     {{csrf_field() }}
					  	<div class="input-group ">
						    <input type="hidden" name="subscribe" value="subscriber">
						    <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-envelope-o"></i></span>
						     <input class="form-control " name="email" type="email" placeholder="your email" aria-label="email" required="">
					        <span class="input-group-btn"><input type="submit" value="Subscribe Now" class="btn btn-primary"></span>
					    </div>
					</form>
				</div>
			</div>
		
			<div class="clearfix"></div>
		</div>
		<hr style="border-top: 1px solid rgba(238, 238, 238, 0.23);">
		<div class="copyright">
		    <div class="container">
		        <div class="col-md-12 col-xs-12 ">
		          <!-- <p>Copyright © 2017, www.asiagolfholiday.com</p> -->
		          <p class="text-center">Power By © www.jngtravelpro.com</p>
		        </div>
		    </div>
		    <div>
		     	<a id="goTotop" style="position: fixed; right: 19px; display: block; bottom: 25px; font-size: 35px; z-index: 2;" href="javascript:void(0)"><span class="fa fa-chevron-circle-up"></span>
		     	</a>
		    </div>
			<div class="clearfix"></div>
		</div>
	</div>
</footer>
