@extends('layout.backend')
@section('destination', 'active')
@section('title','New Province')
@section('content')
<div class="wrapper">
  @include('admin.include.header')
  <!-- Left side column. contains the logo and sidebar -->
  @include('admin.include.leftMenu')
  <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	    <section class="content row">
    		@include('admin.include.message')    		
	    	<form method="POST" action="{{route('editProvince')}}" enctype="multipart/form-data">
	    		{{ csrf_field() }}
				<section class="col-md-8 connectedSortable">
					<div class="panel">
						<div class="col-md-12">			
					       <h3>Province Name</h3>			  
					    </div>
						<div class="row">						    
						    <div class="box-body">
						      	<div class="col-md-12 col-md-12">		                   
			                    	<div class="form-group">
			                            <input type="text" name="title" class="form-control input-md" placeholder="Province Name" required value="{{$pro->province_name}}">
			                            <input type="hidden" name="id" value="{{$pro->id}}">
			                        </div>	
			                       	<div class="form-group row">
			                       		<div class="col-md-6 col-xs-6">
			                            	<input type="text" name="order" class="form-control input-md" placeholder="Province Order" value="{{$pro->province_order}}">
			                            </div>
			                       		<div class="col-md-6 col-xs-6">

			                            	<select class="form-control" name="country">
			                            		@foreach(\App\Country::orderBy('country_name', 'DES')->get() as $con)
			                            			<option value="{{$con->id}}" {{$pro->country_id == $con->id ? 'selected': ''}}>{{$con->country_name}}</option>
			                            		@endforeach
			                            	</select>
			                            </div>			                            
			                            <div class="clearfix"></div>
			                        </div>                          
			                      	<div class="form-group">
			                      		<div class="row" style="padding: 4px;">
			                            	<div class="box-body">
								                <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
												<textarea name="intro" class="form-control my-editor">{!! old('intro', $pro->province_intro) !!}</textarea>
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
			             	<br><br>
			             	<div class="col-md-12">
							    <div class="text-right">
									<input type="submit" value="Update" class="btn bg-olive">
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
