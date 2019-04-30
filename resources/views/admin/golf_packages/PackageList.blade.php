@extends('layout.backend')
@section('golf')
active
@endsection
@section('title')
	Program List
@endsection
@section('content')
<div class="wrapper">
	<script type="text/javascript" src="{{ asset('adminlte/js/lib/jquery.dataTables.min.js') }}"></script>	
  	@include('admin.include.header')
  	<!-- Left side column. contains the logo and sidebar -->
  	@include('admin.include.leftMenu')
  	<!-- Content Wrapper. Contains page content -->
  	<div class="content-wrapper">
  		<section class="content">
  			@include('admin.include.message')
		    <section class="col-md-12">
			    <h3>Golf Lists <i class="fa fa-angle-double-right"></i> <a href="{{route('getGolfForm')}}" class="btn btn-primary btn-xs"> Add New</a></h3><br>
		    </section>
		    <table id="example" class="table table-hover" cellspacing="0" width="100%">
		        <thead>
		            <tr>
		                <th>
		                  	<input type="checkbox"  id="check_all" style="width: 16px; height: 16px; opacity: 0.7;">
			            </th>
		                <th>Image</th>
		                <th>Title</th>
		                <th>Location</th>
		                <th>Created By</th>
		                <th>Created At</th>
		                <th class="text-right">Status</th>                
		            </tr>
		        </thead>
		    	<tbody>	
		    		@foreach($golfPack as $golf)		    		
	    			<tr>
	    				<td style="width: 17px;vertical-align: middle; text-align: center;">
	    					<input type="checkbox" name="checkall" class="checkall" style="width: 16px; height:16px;opacity:0.7;">
						</td>
	    				<td style="width: 8%; vertical-align: middle;text-align: center;">
	    					<?php echo $golf->picture != '' ? '<img class="img-responsive" src="/photos/share/thumbs/'.$golf->picture.'">' : '<i style="font-size:28px; color:#ddd;" class="fa fa-camera"></i>';?>
	    				</td>
	    				<td>{{ str_limit($golf->golf_name, 60)}}</td>
	    				<td>{{{ $golf->province->province_name or ''}}}, {{{ $golf->country->country_name or ''}}}</td>
	    				<td>{{{ $golf->user->fullname or '' }}}</td>
	    				<td style="width: 100px;">{{ date('Y-M-d',strtotime($golf->created_at))}}</td>
	    				<td class="text-right" style="width: 150px;">
	    					<a target="_blank" href="{{url('/')}}/{{{ $golf->country->country_slug or ''}}}/{{{ $golf->province->slug or ''}}}/{{ $golf->golf_slug}}" class="btn btn-success btn-xs">Preview</a>
	    					<a href="{{route('getGoflEdit', ['id' => $golf->id]) }}" class="btn btn-info btn-xs">Edit</a>
	    					@if(Auth::user()->role_id == 1 )
	    					<a data-action="golf"  data-id="{{$golf->id}}"  class="btnDelete btn btn-danger btn-xs">Delete</a>
	    					@endif
	    				</td>
	    			</tr>
		    		@endforeach
		    	</tbody>
		    </table>
	    </div>
	    <div class="clearfix"></div>
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

