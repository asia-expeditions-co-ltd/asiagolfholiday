@extends('layout.app')
@section('title')
{{$golf->golf_name}}
@endsection
@section('content')
<?php 
  use App\component\Content;
?>
@widget('menu')
<div class="overflownone">
    <div class="col-md-12 nopaddingleft nopaddingright">
        <div class="slideshow">
            <div id="myCarousel" class="slide carousel-fade" style="height: 350px;">
                <div class="carousel-inner" id="carousel-warpper" >
                    <div  class="item active item-slide" style="background-image: url(http://2f-design.fr/themes/tee-wp/wp-content/uploads/2014/03/3.jpg); background-position: 0px -80px;">                        
                    </div>  
                </div>    
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="clearfix"></div>
<div class="container">
    <div class="section-welcome" id="top-program" style="padding: 0px;">
        <span class="">
            <span class="fa fa-map-pin" style="color: green; font-size: 27px; padding: 13px 12px;"></span> {{{ $golf->country->country_name or ''}}} <i class="fa fa-angle-double-right"></i> {{{ $golf->province->province_name or ''}}} <i class="fa fa-angle-double-right"></i> {{$golf->golf_name}}
        </span>
        @if(isset($golf->price))
        <span class=" pull-right single-price">{{isset($golf->price)? $golf->price.'/Per Player': ''}}</span>
        @endif
    <div class="clearfix"></div>        
    </div>    
</div>
<!-- our activities  -->
<div class="title-section">
    <div class="container"><br>
        <div class="row">         
            @include('include.message')
            <div class="col-md-9">
                <ul class="list-unstyled ">
                    <li style="float: left; padding: 0px 12px; margin-left: -11px;">
                        <div class="fb-share-button" data-href="/{{{ $golf->country->country_slug or ''}}}/{{{ $golf->province->slug or ''}}}/{{ $golf->golf_slug}}" data-layout="button" data-size="small" data-mobile-iframe="false"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=/{{{ $golf->country->country_slug or ''}}}/{{{ $golf->province->slug or ''}}}/{{ $golf->golf_slug }} &amp;src={{Content::urlImage($golf->picture, '/photos/share/thumbs')}}">facebook</a></div>
                    </li>
                    <li style="float: left; padding: 2px 6px; ">
                        <a class="twitter-share-button" href="http://twitter.com/share?url={{route('singleActivity',['Url' => $golf->id])}}&amp;text={{$golf['golf_name']}}&amp; hashtags=Asia Golf Holiday&amp;">
                        <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                        </a>
                    </li>
                </ul>
                <div class="clearfix"></div>
                <div class="crane-listing bg-white">
                    @include('include.singSlide')
                </div>                      
            </div>
            <div class="col-md-3">
                <div class="panel single-title">
                    <h2>{{$golf->golf_name}} </h2>
                    <form method="post" action="{{route('sentTeeTime')}}">
                        {{csrf_field()}}
                        <input type="hidden" name="link" value="{{url('/')}}/{{{ $golf->country->country_slug or ''}}}/{{{ $golf->province->slug or ''}}}/{{$golf->golf_slug}}">
                        <div class="col-md-12">
                            <div class="input-group form-group" style="width: 100%;">
                                <span class="input-group-btn">
                                    <button class="btn btn-secondary" type="button"><i class="fa fa-calendar"></i></button>
                                </span>
                                <input type="date" name="date" class="form-control" placeholder="Date Check Out" required="">  
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">    
                                        <div class="row" style="padding-left: 15px;">
                                            <select class="form-control" name="teetime" required="">
                                                <option value="">--Tee Time--</option>
                                                @for ($i = 1; $i < 25; $i++)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>                                       
                                    <div class="col-md-6">
                                        <select class="form-control" name="player" required="">
                                            <option value="">--Player--</option>
                                            @for ($i = 1; $i < 11; $i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>                                
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone" class="form-control" placeholder="Phone: +855 (23) 432 007" required="">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Email" required="">
                            </div>
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" placeholder="User Name" required="">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" placeholder="Type message" cols="7" rows="4"></textarea>
                            </div>
                        </div>
                        <div>
                            <center>
                                <button type="submit" class="btn btn-block btn-color text-color">Request Tees Time</button>
                            </center>
                        </div>
                    </form>
                    <br>
                    <div class="include">
                        <div style="padding: 10px;">                            
                            <p style=" font-size: 14px;">
                                {!! $golf->include!!}
                            </p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    @if($golf->highlight)
    <div class="section-title-view text-center" id="highlight">
        <h2>HightLights</h2>
        <hr>
        <div class="text-left">
            <p>{!! $golf->highlight!!}</p>
        </div>
    </div>
    @endif
    @if($golf->desc)
    <div class="section-title-view text-center" id="description">
        <h2>Descriptions</h2>
        <hr>
        <div class="text-left">
            <p>{!! $golf->desc !!}</p>
        </div>
    </div>
    @endif
</div>
<div class="scroll-point hidden-xs">
    <ul>
        <li><a class="scroll-to" action="top-program" href="#top-program">Go Top</a></li>
        @if($golf->highlight)
        <li><a class="scroll-to" action="highlight" href="#highlight">HightLight</a></li>
        @endif
        @if($golf->desc)
        <li><a class="scroll-to" action="description" href="#description">Description</a></li>
        @endif
    </ul>
</div>
@include('include.footer')
@endsection