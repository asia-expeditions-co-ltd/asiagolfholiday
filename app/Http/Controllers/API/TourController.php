<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tour;
use App\Web;
use App\CountView;
use Validator;
use App\Subscribe;
use App\Province;
use App\Country;
use App\GolfPackage;
use Illuminate\Support\Facades\Response;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {   
        // $dataJson = [];
        $dataGallery = [];
        $mydata=[];
        if ($req->itemdetail) {
            $tours   = GolfPackage::where(['golf_slug'=>$req->itemdetail])->first();                
            $dataip = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR']));
            $data   = $dataip['geoplugin_request'];
            $today  = date('Y-m-d 00:00:00');
            // $yesterday = date('Y-m-d 00:00:00',strtotime(date($today). "+1 days"));      
            if ($tours) {
                if ( !CountView::Getdate($today, $data , $tours->id)) {
                            $adds                 = new CountView;
                            $adds->ip             = $dataip['geoplugin_request'];
                            $adds->cityName       = $dataip['geoplugin_city'];
                            $adds->countryName    = $dataip['geoplugin_countryName'];
                            $adds->timezone       = $dataip['geoplugin_timezone'];
                            $adds->tour_id        = $tours->id;               
                            $adds->save();   
                }      
            }
              $ImasgeGallery = explode(",", trim($tours->gallery, ","));
              $dataOrg='/photos/share/';
              $dataThumb='/photos/share/thumbs/';
              if ($tours->picture) {                
                $dataGallery[] = ['original'=> $dataOrg.$tours->picture,'thumbnail'=>$dataThumb.$tours->picture];
              }
              if ($tours->gallery) {            
                foreach ($ImasgeGallery as $key => $value) {
                    $dataGallery[] = ['original'=> $dataOrg.$value,'thumbnail'=>$dataThumb.$value];            
                }
              }
                $dataJson = [
                            'id'=>$tours->id,
                            'title'=>$tours->golf_name,
                            'slug'=>$tours->golf_slug,
                            'tour_price'=>$tours->tour_price,
                            'picture'=> $tours->picture, 
                            'gallery'=>$dataGallery,
                            'tour_desc'=>$tours->desc,
                            'tour_highlight'=>$tours->highlight,
                            'tour_remark'=>$tours->tour_remark,
                            'country_name'=>$tours->country->country_name,
                            'province_name'=>$tours->province->province_name,
                ];           
            // return $tours;
            return response()->json($dataJson)->header("Access-Control-Allow-Origin",  "*");
        } elseif ($req->tour_golf) {
            $mydata = GolfPackage::where(['type'=> $req->tour_golf])->orderBy('id', 'DESC')->get();
            $getdata=[];
            foreach ($mydata as $key => $value) {
              $getdata []=[
                'id'=>$value->id,
                'golf_name'=>$value->golf_name,
                'golf_slug'=>$value->golf_slug,
                'picture'=>$value->picture,
                'country_name'=>$value->country->country_name,
                'province_name'=>$value->province->province_name,
                'iso'=>$value->country->country_iso,
                'price'=>$value->price,
                'dayNight'=>$value->dayNight,
              ];
            }     
            return response()->json($getdata)->header("Access-Control-Allow-Origin",  "*");

        } elseif ($req->country_golf) {
            $mydata = GolfPackage::where(['country_id'=> $req->country_golf,'type'=>$req->type])->orderBy('id', 'DESC')->get();             
            $getdata=[];
            foreach ($mydata as $key => $value) {
              $getdata []=[
                'id'=>$value->id,
                'golf_name'=>$value->golf_name,
                'golf_slug'=>$value->golf_slug,
                'picture'=>$value->picture,
                'country_name'=>$value->country->country_name,
                'province_name'=>$value->province->province_name,
                'iso'=>$value->country->country_iso,
                'price'=>$value->price,
                'dayNight'=>$value->dayNight,
              ];
            }     
            return response()->json($getdata)->header("Access-Control-Allow-Origin",  "*");

        } elseif ($req->limit) {
            $mydata = Web::find(config('app.web'))
                            ->tour()
                            ->where(['status'=>1,'type'=>1])
                            ->whereIn('country_id', [30, 122,175,206])
                            ->inRandomOrder()
                            ->limit($req->limit)
                            ->get();
            return response()->json($mydata)->header("Access-Control-Allow-Origin",  "*");           
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
    // return $req->all();
        $dataip = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR']));
        $validate = Validator::make($req->all(), [
            'email' =>  'required',
            'phone' =>  'required'
        ]);
        $date=date("Y-m-d '00':'00':'00'");
        if (!$validate->fails()) {
                $adds = new Subscribe;           
                $adds->subscribeEmail = $req->email;
                $adds->type           = 'requesttraveling';
                $adds->status         = 1;
                $adds->phone          = $req->phone;
                $adds->ip             = $dataip['geoplugin_request'];
                $adds->cityName       = $dataip['geoplugin_city'];
                $adds->countryName    = $dataip['geoplugin_countryName'];
                $adds->timezone       = $dataip['geoplugin_timezone'];
                // $adds->tour_id        = $req->t_id;
                $adds->save();

                $data = [ 'date' => $req->date,          
                          'phone' => $req->phone,
                          'email' => $req->email, 
                          'player' => $req->player,
                          'username' => $req->username,
                          'link' => $req->link,
                          'message' => $req->message];
                // Mail::to(config('app.email'))->send(new RequestTeeTime($data));
                return  Response::json(['show'=>'true', 'type'=>'success','title'=>'Request Tee Time Success','text'=>'Thank You for Request Traveling'])->header("Access-Control-Allow-Origin",  "*");
            
           }else{
                return  Response::json(['show'=>'true', 'type'=>'warning','title'=>'Sorry','text'=>'OOP'])
                                 ->header("Access-Control-Allow-Origin",  "*");                
            }         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tour = Tour::where(['id'=>$id, 'status'=>1])->first();
        if ($tour) {
            $gallery = [];
            $dataGallery = explode(',', trim($tour->tour_picture, ','));
            foreach ($dataGallery as $key => $val) {
                $gallery = ['gallery'=> $val];
            }
            $tourData = ['title'=>$tour->title, 'slug'=>$tour->slug, 'user'=>$tour->user, 'photo'=>$tour->photo, 'gallery'=>$gallery, 'country'=> $tour->country, 'province'=> $tour->province];
        }else{
            $tourData = ['message'=> "Not Found"];
        }
        return response()
            ->json($tourData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
