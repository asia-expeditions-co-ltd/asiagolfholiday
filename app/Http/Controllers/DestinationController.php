<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\Province;
use Intervention\Image\ImageManagerStatic as Image;
class DestinationController extends Controller
{
    //

    public function countryList(){
    	$country = Country::where('web', 1)->orderBy('country_name', 'ASC')->get();
    	return view('admin.country.countryList', compact('country'));
    }

    public function getCountry(){
    	return view('admin.country.countryForm');
    }

    public function createCountry(Request $req){
    	 try {
	    	if ( $req->hasFile('image') ) {
	            $image = $req->file('image');
	            $filename  = time().'-'.$image->getClientOriginalName();
	            $img = Image::make($image->getRealPath())->fit(300, 300);
	            $img->save(public_path('photos/share/thumbs/'.$filename));
	        	$image->move(public_path('photos/share/'), $filename);   
	        }else{
	            $filename = "";
	        }
	        if ( $req->hasFile('flag') ) {
	            $image = $req->file('flag');
	            $flag  = time().'-'.$image->getClientOriginalName();
	            $img = Image::make($image->getRealPath())->fit(300, 300);
	            $img->save(public_path('photos/share/thumbs/'.$flag));
	        }else{
	            $flag = "";
	        }
	        $count = new Country;
	        $count->country_name = $req->country_name;
	        $count->country_slug = str_slug($req->country_name,'-');
	        $count->country_iso = $req->country_iso;
	        $count->country_code = $req->country_code;
	        $count->web = 1;
	        $count->country_status = 1;
	        $count->country_intro = $req->intro;
	        $count->country_photo = $filename;
	        $count->flag = $flag;
	        $count->save();
	        return back()->with('message', 'Publish Success');        	
        } catch (Exception $e) {
        	return back()->with('message', 'There is something went wrong, please try again');        	
        }
    }

    public function getCountryEdit($id){
    	$con = Country::find($id);
    	return view('admin.country.countryFormEdit', compact('con'));
    }

    public function updateCountry(Request $req){
    	try {
	    	if ( $req->hasFile('image') ) {
	            $image = $req->file('image');
	            $filename  = time().'-'.$image->getClientOriginalName();
	            $img = Image::make($image->getRealPath())->fit(400, 270);;
	            $img->save(public_path('photos/share/thumbs/'.$filename));
	        	$image->move(public_path('photos/share/'), $filename);   
	        }else{
	            $filename = $req->old_image;
	        }
	        if ( $req->hasFile('flag') ) {
	            $image = $req->file('flag');
	            $flag  = time().'-'.$image->getClientOriginalName();
	            $img = Image::make($image->getRealPath())->fit(400, 270);
	            $img->save(public_path('photos/share/thumbs/'.$flag));
	        }else{
	            $flag = $req->old_flag;
	        }
	        $count = Country::find($req->cid);
	        $count->country_name = $req->country_name;
	        $count->country_slug = str_slug($req->country_name,'-');
	        $count->country_iso = $req->country_iso;
	        $count->web = 1;
	        $count->country_status = 1;
	        $count->country_code = $req->country_code;
	        $count->country_intro = $req->intro;
	        $count->country_photo = $filename;
	        $count->flag = $flag;
	        $count->save();
	        return back()->with('message', 'Update Success');        	
        } catch (Exception $e) {
        	return back()->with('message', 'There is something went wrong, please try again');        	
        }
    }

    // get provice date_add()

    public function provinceList(){
    	$province = Province::orderBy('province_name', 'ASC')->get();
    	return view('admin.province.proviceList', compact('province'));
    }

    public function createProvince(){
    	return view('admin.province.provinceForm'); 
    }

    public function createProvinceStore(Request $req){
    	$addPro = new Province;
    	$addPro->province_name = $req->title;
    	$addPro->slug = str_slug($req->title, '-');
    	$addPro->country_id = $req->country;
    	$addPro->province_order = $req->order;
    	$addPro->web = 1;
    	$addPro->newsletter = 0;
    	$addPro->province_intro = $req->intro;
    	$addPro->province_status = 1; 
    	$addPro->save();
    	return back()->with('message', 'Published Success');
    }

    public function updateProvince($pid){
    	$pro = Province::find($pid);
    	return view('admin.province.editprovinceForm', compact('pro'));
    }

    public function editProvince(Request $req){
    	$addPro = Province::find($req->id);
    	$addPro->province_name = $req->title;
    	$addPro->slug = str_slug($req->title, '-');
    	$addPro->country_id = $req->country;
    	$addPro->province_order = $req->order;
    	$addPro->web = 1;
    	$addPro->newsletter = 0;
    	$addPro->province_intro = $req->intro;
    	$addPro->province_status = 1; 
    	$addPro->save();
    	return redirect()->route('provinceList')->with('message', 'Update Success');
    }
}
