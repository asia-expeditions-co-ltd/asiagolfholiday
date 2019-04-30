@extends('layout.backend')
@section('slide')
active
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
	    	<form method="POST" action="{{route('createSlide')}}" enctype="multipart/form-data">
	    		{{ csrf_field() }}
				<section class="col-md-12 connectedSortable">
					<div class="panel">
						<div class="box-header">			
					       <h3>Add New Slide</h3>			  
					    </div>					    
						<div class="row">						    
						    <div class="box-body">
						      	<div class="col-md-12 col-md-12">    
		                            <table class="table" id="productList">
		                            	<tr>
		                            		<td><input type="file" name="slide[]" class="form-control"></td>
		                            		<td><textarea class="form-control" name="intro[]"></textarea></td>
		                            		<td><input type="text" name="title[]" class="form-control" placeholder="Slide Title"></td>
		                            		<td><a href="javascript:void(0)" class="btnSl btn btn-info"><i class="fa fa-plus-square"></i></a></td>
		                            	</tr>
		                            </table>		                        
			                        <hr class="colorgraph">
				                <input type="submit" value="Public" class="btn bg-olive">
				                </div>				                				
						  	</div>
					  	</div>				  
				  	</div>
				</section>			
				<div class="clear"></div>  
			</form>
	    </section>
	    <!-- /.content -->
	</div>
  <!-- /.content-wrapper -->
  @include('admin.include.footer')
</div>

<script type="text/javascript">
	$('.LoadData').summernote({
	  	height: 150,   //set editable area's height
	  	codemirror: { // codemirror options
	    theme: 'monokai'
	  }
	});
</script>
@endsection
