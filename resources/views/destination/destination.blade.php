@extends('layout.app')
@section('title')
{{{$get_con->country_name or ''}}} Golf Courses
@endsection
@section('content')
@widget('menu')
<?php 
use App\component\Content;
 ?>
<div class="overflownone">
    <div class="col-md-12 nopaddingleft nopaddingright">
        <div class="slideshow">
            <div id="myCarousel" class="slide-single carousel-fade" style="height: 350px;">
                <div class="carousel-inner" id="carousel-warpper">
                    <?php 
                    $image = isset($get_con->country_photo) != null ? '/photos/share/'.$get_con->country_photo :'http://2f-design.fr/themes/tee-wp/wp-content/uploads/2014/03/3.jpg';
                    ?>
                    <div class="item active item-slide" style="background-image: url({{$image}}); background-position: 0px -80px;">                        
                    </div>  
                </div>    
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>

<form method="get">
    <div class="container">
        <div class="section-welcome">
            <div class="pull-left">
                &nbsp;<span class="fa fa-map-pin" style="color: green; font-size: 27px;"></span> &nbsp; 
                <span>{{{ $get_con->country_name or 'JOIN WITH US TO PLAY GOLF TODAY' }}}</span>
            </div>
            @if(isset($active))
            <div class="pull-right">
                <select name="by" id="sort_by" class="form-control input-sm">
                    <option value="">sort By</option>
                    @foreach(\App\Country::where('country_status', 1)->orderBy('country_name', 'DES')->get() as $con)
                        <option value="{{$con->country_slug}}" {{ $active == $con->id ? 'selected':''}}>{{$con->country_name}}</option>
                    @endforeach
                </select>
            </div>
            @endif
            <div class="clearfix"></div>
        </div>     
    </div>
    
    <div class="title-section">
        <br>
        <div class="container">
            @if( $golfCourse->count() >= 1)
                <div class="row">         
                    <div class="col-md-12">
                        <div class="golf-title"><strong><i class="glyphicon glyphicon-tree-deciduous"></i> Golf Courses</strong></div>
                        @foreach($golfCourse->chunk(3) as $golfChunk)
                        <div class="row">
                            @foreach($golfChunk as $golf)
                                <div class="col-md-4 col-xs-6 pro-golf" style="overflow: hidden; margin-bottom: 28px;">
                                    <div class="col-md-12">
                                    <span class="sticker">{{ $golf->golf_name }}</span>
                                    </div>
                                    <a href="/{{{ $golf->country->country_slug or ''}}}/{{{ $golf->province->slug or ''}}}/{{ $golf->golf_slug}}"> 
                                        <img src="{{Content::urlImage($golf->picture, '/photos/share/thumbs')}}" style="width: 100%;">
                                    </a>
                                    <div class="pro-captions">  
                                        <div class="pull-left">
                                            <strong>{{ $golf->daynight }}</strong>
                                        </div>
                                        <div class="pull-right">
                                            <a href="javascript::void(0)" class="btn-color btn btn-info btn-xs">Book Now</a>
                                        </div>
                                        <div class="clearfix"></div>    
                                    </div>                                    
                                </div>
                            @endforeach
                        </div> 
                        @endforeach
                    </div>                
                </div>
            @endif

            @if($golfpackage->count() >= 1)
            <div class="row">         
                <div class="col-md-12 ">
                    <div class="golf-title"><strong><i class="glyphicon glyphicon-tree-deciduous"></i> Golf Packages</strong></div>
                    @foreach($golfpackage->chunk(3) as $golfPackChunk)
                    <div class="row">
                        @foreach($golfPackChunk as $golf)
                            <div class="col-md-4 col-xs-6 pro-golf" style="overflow: hidden; margin-bottom: 28px;">
                                <div class="col-md-12">
                                <span class="sticker">{{ $golf->golf_name }}</span>
                                </div>
                                <a href="/{{{ $golf->country->country_slug or ''}}}/{{{ $golf->province->slug or ''}}}/{{ $golf->golf_slug}}"> 
                                    <img src="{{Content::urlImage($golf->picture, '/photos/share/thumbs/')}}" alt="{{$golf->golf_name}}" class="img-responsive">
                                </a>
                                <div class="pro-captions">  
                                    <div class="pull-left">
                                        <strong>{{ $golf->daynight }}</strong>
                                    </div>
                                    <div class="pull-right">
                                        <a href="javascript::void(0)" class="btn-color btn btn-success btn-xs">Book Now</a>
                                    </div>
                                    <div class="clearfix"></div>    
                                </div>                                
                            </div>
                        @endforeach
                    </div> 
                    @endforeach    
                </div>                
            </div>
            @endif
        </div>
    </div>
</form>
<div class="3w-margin-top"></div>
@include('include.footer')

@endsection