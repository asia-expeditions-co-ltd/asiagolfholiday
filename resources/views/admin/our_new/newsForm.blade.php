@extends('layout.backend')
@section('news')
active
@endsection
@section('title')
	News - Add
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
	    	<form method="POST" action="{{route('createNew')}}" enctype="multipart/form-data">
	    		{{ csrf_field() }}
				<section class="col-md-8 connectedSortable">
					<div class="panel">
						<div class="col-md-12">			
					       <h3>Add News</h3>			  
					    </div>
						<div class="row">						    
						    <div class="box-body">
						      	<div class="col-md-12 col-md-12">		                   
			                    	<div class="form-group">
			                            <input type="text" id="title" name="title" class="form-control input-md" placeholder="News Title" required>
			                        </div>		                            
			                      	<div class="form-group">
			                      		<div class="row" style="padding: 4px;">
			                            	<div class="box-body">
								                <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
												<textarea name="intro" class="form-control my-editor">{!! old('intro') !!}</textarea>
								            </div>
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
			             	<div class="clear"></div>
			             	<br><br>
			             	<div class="col-md-12">	
			             		<div class="row">
							    	<hr class="colorgraph">		
							    </div>			    		
							    <div class="text-right">
									<input type="submit" value="Public" class="btn bg-olive">
								</div>
								<div class="clear"></div>	
								 <br>	               	
				            </div>				           
			             	<div class="clear"></div>
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
