<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use App\SlideShow;
class SlideController extends Controller
{
    //
    public function getSlide(){
    	$slides = SlideShow::orderBy('id', 'DESC')->get();
    	return view('admin.slides.slideList', compact('slides'));
    }

    public function getSlideForm(){
    	return view('admin.slides.slideForm');
    }

    public function createSlide(Request $req){
    	if ($req->btnSave == 'Update') {
    		if ( $req->hasFile('image') ) {
	            $image = $req->file('image');
	            $filename = str_slug($image->getClientOriginalName(), '-').".".$image->getClientOriginalExtension();
	            $img = Image::make($image->getRealPath())->fit(1600, 770);
	            $image->move(public_path('photos/share/'), $filename);   
	        }else{
	           $filename = $req->old_image;
		    }
	    	$eslide =  SlideShow::find($req->eid);
	    	$eslide->picture = $filename;
	    	$eslide->name = $req->title;
	    	$eslide->user_id = \Auth::user()->id;
	    	$eslide->save();
	    	return back()->with('message', 'Update success');
    	}
    	if ( $req->hasFile('image') ) {
            $image = $req->file('image');
            $filename = str_slug($image->getClientOriginalName(), '-').".".$image->getClientOriginalExtension();
            $img = Image::make($image->getRealPath())->fit(1600, 770);
            $image->move(public_path('photos/share/'), $filename);   
        }else{
           $filename = "";
	    }
    	$slide =  new SlideShow;
    	$slide->picture = $filename;
    	$slide->name = $req->title;
    	$slide->user_id = \Auth::user()->id;
    	$slide->save();
    	return back()->with('message', 'publish success');
    }
}
