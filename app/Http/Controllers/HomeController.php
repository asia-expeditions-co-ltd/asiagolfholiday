<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\GolfPackage;
use \App\Country;
use \App\ourNew;


use Illuminate\Support\Facades\Mail;
use \App\Mail\RequestTeeTime;
use \App\Mail\ContactUs;
use \App\CountView;
class HomeController extends Controller
{
    //redirect to the home page of webpage
    public function getHome(){
    	return view('index');
    }

    public function getGolfPackage(Request $req) {
            $get_con = Country::where('country_slug', $req->by)->first();
    	if (isset($req->by)) {            
    		$golfpackage = GolfPackage::where(['country_id'=>$get_con->id, 'type'=> 2])->orderByRaw("RAND()")->take(6)->get();
            $golfCourse = GolfPackage::where(['country_id'=>$get_con->id, 'type'=> 1])->orderByRaw("RAND()")->take(6)->get();
    		$active = $get_con->id;
    	}else{
    		$active = '';
    		$golfpackage = GolfPackage::where('type', 2)->orderBy('id', 'DESC')->orderByRaw("RAND()")->take(6)->get();
            $golfCourse = GolfPackage::where('type', 1)->orderBy('id', 'DESC')->orderByRaw("RAND()")->take(6)->get();
    	}
        // return $get_con;
    	return view('destination.destination', compact('golfpackage', 'golfCourse', 'get_con','active'));
    }

    public function getGolfCourse($country){
        $get_con = Country::where('country_slug', $country)->first();
        $golfpackage = GolfPackage::where(['country_id'=>$get_con->id, 'type'=> 2])->orderByRaw("RAND()")->take(6)->get();
        $golfCourse = GolfPackage::where(['country_id'=>$get_con->id, 'type'=> 1])->orderByRaw("RAND()")->take(6)->get();
        return view('destination.destination', compact('golfpackage', 'golfCourse', 'get_con'));
    }

    public function getGoflDetails($country, $province, $golfName){
           $golf = GolfPackage::where('golf_slug', $golfName)->first();

           $dataip    = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR']));
           $data      = $dataip['geoplugin_request'];
           $today     = date('Y-m-d 00:00:00');
        if ( !CountView::Getdate($today, $data , $golf->id)) {
            $adds                 = new CountView;
            $adds->ip             = $dataip['geoplugin_request'];
            $adds->cityName       = $dataip['geoplugin_city'];
            $adds->countryName    = $dataip['geoplugin_countryName'];
            $adds->timezone       = $dataip['geoplugin_timezone'];
            $adds->tour_id        = $golf->id;
            $adds->save();   
        }
        return view("destination.singleView", compact('golf'));
    }

    // activities section making
    public function getActivity(){
        $ourNews = ourNew::orderBy('id', 'DESC')->paginate();
        return view('activity.activity', compact('ourNews'));
    }

    // view single view openssl_pkey_get_details(key)
    public function singActivity($New){
        $Onew = ourNew::where('slug', $New)->first();
        return view('activity.singActivity', compact('Onew'));
    }

    // for request tee time()
    public function getRequestTeeTime(Request $req){
        $data = ['date' => $req->date,
                'teetime' => $req->teetime,
                'phone' => $req->phone,
                'email' => $req->email, 
                'player' => $req->player,
                'username' => $req->username,
                'link' => $req->link,
                'message' => $req->message ];
        Mail::to(config('app.email'))->send(new RequestTeeTime($data));
        return back()->with('message' , 'Tees Time Request Successfully');
    }

    // for contact us anytime
    public function getContactUs(){
        return view('contact.contactUs');
    }

    // for contact sent message
    public function sendContact(Request $req){
        $content = ['fullname'=> $req->fullname, 'phone'=> $req->phone, 'email'=> $req->email, 'message'=> $req->message];
        Mail::to(config('app.email'))->send(new ContactUs($content));
        return back()->with('message' , 'Your message has been submitted');
    }

}
