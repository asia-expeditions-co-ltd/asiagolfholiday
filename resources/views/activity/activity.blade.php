@extends('layout.app')
@section('title')
Our Activities
@endsection
@section('content')
@widget('menu')

<?php 
use App\component\Content;
 ?>
 <div class="overflownone">
    <div class="col-md-12 nopaddingleft nopaddingright">
        <div class="slideshow">
            <div id="myCarousel" class="slide carousel-fade" style="height: 350px;">
                <div class="carousel-inner" id="carousel-warpper" >
                    <div  class="item active item-slide" style="background-image: url(/photos/share/golf.jpg); background-position: 0px -80px;">                        
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
                &nbsp;<span class="fa fa-map-o" style="color: green; font-size: 27px;"></span> &nbsp; Our Lates Activities, {{date('d-M-Y')}}
            </div>
            <div class="clearfix"></div>        
        </div>
        <div class="clearfix"></div>        
    </div>
    <!-- our activities  -->
    <div class="title-section">
        <div class="container"><br>
            <div class="row">         
                <div class="col-md-9">
                    @foreach($ourNews as $news)
                    <div class="crane-listing col-md-12 col-xs-6 bg-white">
                        <div class="row">
                            <div class="col-md-5" style="overflow: hidden;">
                                <div class="row">
                                     <a href="{{route('singleActivity', ['slug' => $news->slug])}}"><img src="{{Content::urlImage($news->picture, 'photos/share/thumbs')}}" alt=" " class="img-responsive">
                                    </a>
                                    <!-- <span class="sticker">{{{ $news->province->province_name or '' }}}</span> -->
                                </div>
                            </div>
                            <div class="col-md-7">
                                <h3><a href="{{route('singleActivity', ['slug' => $news->slug])}}">{{$news->tittle}}</a></h3>
                                <h6><small>Published Date: {{date('d-M-Y H:i: A', strtotime($news->created_at))}}</small></h6>
                                {!! str_limit(strip_tags($news->description),170) !!}
                            </div> 
                        </div>   
                        <div class="clearfix"></div>
                    </div>
                    @endforeach
                    {{$ourNews->links()}}         
                </div>
                <!-- left sidebar -->
                <div class="col-md-3">
                    
                </div>
                <!-- end left sidebar     -->
            </div>
        </div>
    </div>
</form>
<div class="3w-margin-top"></div>
@include('include.footer')

@endsection