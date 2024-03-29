@extends('layout.backend')
@section('golf')
active
@endsection
@section('title')
	Add New Golf
@endsection
@section('content')
<div class="wrapper">
  @include('admin.include.header')
  <!-- Left side column. contains the logo and sidebar -->
  @include('admin.include.leftMenu')
  <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	    <section class="content row">
    		@include('admin.include.message')    		
	    	<form method="POST" action="{{route('createGolf')}}" enctype="multipart/form-data">
	    		{{ csrf_field() }}
				<section class="col-md-8 connectedSortable">
					<div class="panel">
						<div class="col-md-12">			
					       <h3>Golf Name</h3>			  
					    </div>
						<div class="row">						    
						    <div class="box-body">
						      	<div class="col-md-12 col-md-12">
			                    	<div class="form-group">
			                            <input type="text" name="golf_name" class="form-control input-md" placeholder="Golf Name" required>
			                        </div>		            
			                        <div class="form-group row">
			                        	<div class="col-md-6">
				                        	<label for="country">Country</label>
				                        	<select name="golf_country" class="form-control btnSearch" action-to="province">
												<option value="">--select--</option>
												@foreach(\App\Country::orderBy('country_name', 'ASC')->get() as $con)	
												<option value="{{$con->id}}">{{$con->country_name}}</option>
												@endforeach		
				                        	</select>
			                        	</div>
			                        	<div class="col-md-6">
				                        	<label for="country">Province</label>
				                        	<select name="golf_province" class="form-control " id="province">
												<option value="">--select--</option>
												@foreach(\App\Province::where('web', 1)->orderBy('province_name', 'ASC')->get() as $pro)	
												<option value="{{$pro->id}}">{{$pro->province_name}}</option>
												@endforeach		
				                        	</select>
			                        	</div>		                        	
			                        </div> 
			                        <div class="form-group row">
			                        	<div class="col-md-6">
			                        		<div class="row">
					                        	<div class="col-md-6">
						                        	<label for="dayNight">Days/Nights</label>
						                        	<input class="form-control" name="dayNight" placeholder="Day/ Night" >
					                        	</div>
					                        	<div class="col-md-6">
						                        	<label for="price">Price</label>
						                        	<input class="form-control" name="price" placeholder="Price: 0:00 USD">
					                        	</div>	
				                        	</div>
			                        	</div>
			                        	<div class="col-md-6">
			                        		<label>Golf Type</label>
			                        		<select name="golf_type" class="form-control">
			                        			<option value="">--select--</option>
			                        			@foreach(\App\GoflCategory::orderBy('name','ASC')->get() as $cat)
			                        				<option value="{{$cat->id}}">{{$cat->name}}</option>
			                        			@endforeach
			                        		</select>
			                        	</div>	                        	
			                        </div>     
			                        <div class="form-group row">
		                            	<div class="col-md-12">
		                            		<label for="include">Include / Remark</label>
							                <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
											<textarea name="include" class="form-control my-editor">{!! old('include') !!}</textarea>
							            </div>
			                        </div>           
			                      	<div class="form-group row">
		                            	<div class="col-md-12">
		                            		<label for="desc">Descriptions</label>
							                <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
											<textarea name="desc" class="form-control my-editor">{!! old('desc') !!}</textarea>
							            </div>
			                        </div>
			                        <div class="form-group row">
		                            	<div class="col-md-12">
		                            		<label for="highlight">HighLight</label>
							                <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
											<textarea name="highlight" class="form-control my-editor">{!! old('intro') !!}</textarea>
							            </div>
			                        </div>
			                        <hr class="colorgraph">
				                </div>        
						  	</div>
					  	</div>				  
				  	</div>
				</section>
				<section class="col-md-4 connectedSortable">
					<div class="box box-solid">
					    <div class="box-header"></div>		     
					    <div class="panel">
				    		<div class="col-md-12">
				    			<div class="form-group">
				    			<label>Feature Image</label>
				    			<div class="row">
					    			<hr style="margin-top: 0px; margin-bottom: 4px;">
					    		</div>
					    		<a id="choosImg" href="javascript:void(0)">Choose Image</a>
						        	<input name="image" type='file' id="imgInp" style="display: none;" />
						        	<center>
								    	<img class="img-responsive" id="blah" src="#"  style="display: none; cursor: pointer;"/>
								    </center>   	
							    </div>
				            </div>
				            <div class="clearfix"></div>
				            <br><br>
				            <div class="col-md-12">
				            	<div class="form-group">
					    			<label>Gallery Image</label>
					    			<div class="row">
					    			<hr style="margin-top: 0px; margin-bottom: 4px;">
					    			</div>
					    			<a id="choosGallery" href="javascript:void(0)">Choose Image</a>
						        	<input name="gallery[]" type='file' id="gallery" style="display: none;" multiple="" />
						        	<center>
								    	<img class="img-responsive" id="blah" src="#"  style="display: none; cursor: pointer;"/>
								    </center>
								    <div class="placeImage">
								    	
								    </div> 
							    </div>  	
				            </div>			             
			             	<br><br>
			             	<div class="col-md-12">			
			             		<div class="row">		
								    <hr class="colorgraph">	
								</div>
							    <div class="text-right">
									<input type="submit" value="Public" class="btn bg-olive">
								</div>								
								<br>	               	
				            </div>	
				            <div class="clearfix"></div>		             	
						</div>
					</div>			
				</section>   
			<div class="clear"></div>  
			</form>
	    </section>
	    <!-- /.content -->
	</div>
  <!-- /.content-wrapper -->
  	@include('admin.include.editorscript')
	@include('admin.include.footer')
</div>
@endsection
