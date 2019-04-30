@extends('layout.backend')
@section('slide')
active
@endsection
@section('title')
	Slide List
@endsection
@section('content')
<div class="wrapper">
	<script type="text/javascript" src="{{ asset('adminlte/js/lib/jquery.dataTables.min.js') }}"></script>	
  	@include('admin.include.header')
  	<!-- Left side column. contains the logo and sidebar -->
  	@include('admin.include.leftMenu')
  	<!-- Content Wrapper. Contains page content -->
  	<div class="content-wrapper">
  		@include('admin.include.message')
  		<div class="col-md-12"><br>  			
			<form method="POST" action="{{route('createSlide')}}" enctype="multipart/form-data">
	    		{{ csrf_field() }}
				<div class="panel">
					<div class="box-header">			
				       <h3>Add New Slide</h3>			  
				    </div>					    
					<div class="row">						    
					    <div class="box-body">
					      	<div class="col-md-12">    
	                            <table class="table">
	                            	<tr>
	                            		<td style="width: 400px;">

	                            			<span id="uploadSlide" class="fa fa-cloud-upload" style="cursor: pointer; font-size: 29px;color: #777;"></span>
	                            			<input id="slideImg" style="display: none;" type="file" name="image" class="form-control">
	                            			<img src="#" id="ImgShow" style="width: 100%; display: none;" >
	                            			<input type="hidden" name="old_image" id="old_image">
	                            			<input type="hidden" name="eid" id="eid">
	                            		</td>	                            		
	                            		<td>
	                            			<input type="text" name="title" id="title" class="form-control" placeholder="Slide Title">
	                            		</td>
	                            		<td>
	                            			<input type="submit" name="btnSave" id="btnPublish" value="Public" class="btn btn-primary btn-sm">
	                            		</td>
	                            	</tr>
	                            </table>		                        
		                        <hr class="colorgraph">
			                </div>		                				
					  	</div>
				  	</div>				  
			  	</div>
			</form>			  
		    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
		        <thead>
		            <tr>		               
		                <th>Image</th>
		                <th>Name</th>
		                <th>Created At</th>
		                <th class="text-right">Status</th>                
		            </tr>
		        </thead>
		    	<tbody>	
		    		@foreach($slides as $slide)		    		
	    			<tr>	    					    				
	    				<td style="width: 20%; vertical-align: middle;text-align: center;">
	    					<img src="/photos/share/{{$slide->picture}}" class="img-responsive">
	    				</td>
	    				<td>{{ $slide->name }}</td>
	    				<td>{{ date('d-M-Y', strtotime($slide->created_at))}}</td>	    				
	    				<td class="text-right">
	    					<a data-title="{{$slide->name}}" data-id="{{$slide->id}}" data-img="{{$slide->picture}}" href="javascript:void(0)" class="btnEdit btn btn-info btn-xs">Edit</a>
	    					@if(Auth::user()->role_id == 1 )
	    					<a data-action="slide" data-id="{{$slide->id}}"  class="btnDelete btn btn-danger btn-xs">Delete</a>	    					
	    					@endif
	    				</td>
	    			</tr>
		    		@endforeach
		    	</tbody>
		    </table>
	    </div><div class="clearfix"></div>
   	</div>
   	@include('admin.include.footer')
</div>
<script type="text/javascript">
	$(document).ready(function() {
	    $('#example').DataTable();

	    $("#check_all").click(function () {
	        if($("#check_all").is(':checked')){
	            if ($('#example tbody tr:visible')) {
	                $('#example tbody tr:visible td .checkall').prop('checked', true);     
	            }else{
	                $('#example tbody tr:visible td .checkall').prop('checked', false);     
	            }          
	        } else {
	            $(".checkall").prop('checked', false);
	        }
	    });
	} );
</script>
@endsection

