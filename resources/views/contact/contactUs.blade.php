@extends('layout.app')
@section('title')
Contact Us Form
@endsection
@section('content')
@widget('menu')
<div class="overflownone">
    <div class="col-md-12 nopaddingleft nopaddingright">
        <div class="slideshow">
            <div id="myCarousel" class="slide carousel-fade" style="height: 350px;">
                <div class="carousel-inner" id="carousel-warpper" >
                    <div class="item active item-slide" style="background-image: url(http://2f-design.fr/themes/tee-wp/wp-content/uploads/2014/03/3.jpg); background-position:0px -80px;">                        
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
            <span class="fa fa-envelope-o" style="color: green; font-size: 27px; padding: 13px 12px;"></span> Feel free to contact us anytime
        </span>
        <!-- <span class=" pull-right single-price">/Per Player </span> -->
    <div class="clearfix"></div>        
    </div>    
</div>
<!-- our activities  -->
<div class="title-section">
    <div class="container"><br>
        <div class="row">         
            @include('include.message')
            <div class="col-md-9">
                <div class="crane-listing bg-white">
                    <div class="well-sm">
                        <form action="{{route('sendContact')}}" method="post">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Full Name</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <span class="fa fa-user "></span>
                                             </span>
                                            <input type="text" name="fullname" class="form-control"  placeholder="Full name" required="required" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone Number</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-phone "></span>
                                            </span>
                                        <input type="text" name="phone" class="form-control" placeholder="Phone : +855 (23) 342 007" required="required" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">
                                            Email Address</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-envelope-o"></span>
                                            </span>
                                            <input type="email" name="email" class="form-control" placeholder="Email address" required="required" />
                                        </div>
                                    </div>                             
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="message">
                                            Message</label>
                                        <textarea name="message" class="form-control" rows="8" cols="25" 
                                            placeholder="Type your message here ...!"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary pull-right">
                                        Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>                      
            </div>
            <div class="col-md-3">  
                @include('include.sidebarleftActivities')
            </div>
        </div>
    </div>
    <br>
</div>
@include('include.footer')
@endsection