@extends('layout.app')
@section('title')
{{$Onew->tittle}}
@endsection
@section('content')
@widget('menu')
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

<div class="container">
    <div class="section-welcome" id="top-program" style="padding: 12px;">
        <span class="">
            <a href="url('/')">Home</a> <i class="fa fa-angle-double-right"></i> 
            {{$Onew->tittle}}
        </span>       
    </div>    
</div>
@include('include.message')

<!-- our activities  -->
<div class="title-section">
    <div class="container"><br>
        <div class="row">         
            <div class="col-md-8">
                <div class="bg-white wrap-image">
                    <div><strong style="font-size: 2em;">{{$Onew->tittle}}</strong></div>
                    <div class="social-wrapper text-right">
                        <!-- <a href="#"><i id="social-fb" class="fa fa-facebook-square fa-2x social"></i></a>
                        <a href="#"><i id="social-tw" class="fa fa-twitter-square fa-2x social"></i></a>
                        <a href="#"><i id="social-gp" class="fa fa-google-plus-square fa-2x social"></i></a> -->
                        <ul class="list-unstyled ">
                            <li style="float: left; padding: 0px 12px; margin-left: -11px;">
                               <!--  <div class="fb-share-button" data-href="{{route('singleActivity',['Url' => $Onew->slug])}}" data-size="large" data-mobile-iframe="false">
                                    <a class="fb-xfbml-parse-ignore" target="_blank" href="http://www.facebook.com/sharer.php?u={{route('singleActivity',['Url' => $Onew->slug])}}">
                                        <i class="fa fa-facebook-square"></i>
                                    </a>
                                </div> -->


                                <div class="fb-share-button" data-href="{{route('singleActivity',['Url' => $Onew->slug])}}" data-layout="button" data-size="small" data-mobile-iframe="false"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{route('singleActivity',['Url' => $Onew->slug])}} &amp;src=sdkpreparse">facebook</a></div>
                            </li>
                            <li style="float: left; padding: 2px 0px;">
                                <a class="twitter-share-button" href="http://twitter.com/share?url={{route('singleActivity',['Url' => $Onew->slug])}}&amp;text={{$Onew['golf_name']}}&amp; hashtags={{config('app.title')}}&amp;">
                                <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                            </a>
                            </li>
                        </ul>
                    </div>
                    <div class="img">
                        <img src="{{url('/')}}/photos/share/{{$Onew->picture}}" class="img-responsive">
                    </div>
                    <div class="dateTime">
                        <i class="fa fa-calendar"></i> <span>{{date('d-M-Y H:i A', strtotime($Onew->created_at))}}</span>
                    </div>
                    <p>{!! $Onew->description !!}</p>
                    <hr>                    
                </div>                      
            </div>
            <div class="col-md-4">  
               @include('include.sidebarleftActivities')
            </div>
        </div>
    </div>
</div>
@include('include.footer')
@endsection