<div class="section-title welcome-section widget-title">
    <h2>Our Destinations</h2>
</div>
@foreach(\App\Country::where('country_status', 1)->orderBy('country_name', 'ASC')->get() as $con)
<div class="col-md-4 col-xs-12 golf-club">           
    <div class="row">             
      <div class="form-group" style="margin:8px; position: relative;">
        <a href="/{{$con->country_slug}}/golf-courses">
          <div class="caption">
            <h2><b>{{$con->country_name}}</b></h2>
            <strong>{{\App\GolfPackage::where(['country_id'=>$con->id, 'type'=>1])->count()}} Golf Courses</strong>
          </div>
          <img src="/photos/share/thumbs/{{$con->country_photo}}" style="width: 100%;">
        </a>
      </div>
    </div>
</div>        
@endforeach    

