@extends('layout.backend')
@section('destination')
	active
@endsection
@section('title')
	Country List
@endsection
@section('content')
<div class="wrapper">
  	@include('admin.include.header')
  	@include('admin.include.leftMenu')
  	<script type="text/javascript" src="{{ asset('adminlte/js/lib/jquery.dataTables.min.js') }}"></script>	
  	<div class="content-wrapper">
  		
		<section class="content">
			<!-- script for news message json -->
			@include('admin.include.message')			
			<!-- end message json>? -->
			<h3>Country Lists <i class="fa fa-angle-double-right"></i> <a href="{{route('getCountry')}}" class="btn btn-primary btn-xs">Add New</a></h3>	
			<table id="example" class="table table-hover " cellspacing="0" width="100%">
		        <thead>
		            <tr>
		            	<th>Flag</th>
		                <th>Country</th>
		                <th>Country Code</th>
		                <th style="width: 80px;">Created_at</th>
		                <th style="width: 80px;" class="text-right">Status</th>                
		            </tr>
		        </thead>
		        <tbody>
		            @foreach($country as $con)
		            <tr>
		            	<td style="width: 60px" class="text-center">
		            		@if($con->flag)
		            		<img style="width: 100%;" src="/photos/share/thumbs/{{$con->flag}}">
		            		@else
		            			<i style="font-size:28px; color:#ddd;" class="fa fa-camera"></i>
		            		@endif
		            	</td>
		            	<td>{{$con->country_name}}</td>
		            	<td>{{$con->country_iso}}</td>
		            	
		            	<td style="width: 80px;">{{ date('Y-M-d', strtotime($con->created_at))}}</td>
		            	<td style="width: 80px;" class="text-right">		            		
				    		<a href="{{route('getCountryEdit', ['country_id'=> $con->id])}}" class="btn btn-info btn-xs">Edit</a>
				    		<a data-action="country" data-id="{{$con->id}}" class="btnDelete btn btn-danger btn-xs">Delete</a>
		            	</td>
		            </tr>
		            @endforeach
		        </tbody>
		    </table>
		</section>
    </div>
   	@include('admin.include.footer')
</div>
<script type="text/javascript">
	$(document).ready(function() {
	    $('#example').DataTable();
	} );
</script>
@endsection

