<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ourNew;
use App\GolfPackage;
use App\Province;
use App\Country;
use App\SlideShow;
class AdminController extends Controller
{
    //
    public function getDashboard(){
    	return view('admin.index');
    }

    // option delete all action 
    public function deleteOption(Request $req){
    	
    	if ($req->action == 'user') {
    		User::find($req->dataId)->delete();
    		return response()->json(['message' => 'Your data has been removed', 'status' => 'yes']);
    	}elseif ($req->action == 'new') {
            ourNew::find($req->dataId)->delete();
            return response()->json(['message' => 'Your data has been removed', 'status' => 'yes']);
        }elseif ($req->action == 'golf') {
            GolfPackage::find($req->dataId)->delete();
            return response()->json(['message' => 'Your data has been removed', 'status' => 'yes']);
        }elseif ($req->action == 'country') {
            Country::find($req->dataId)->delete();
            return response()->json(['message' => 'Your data has been removed', 'status' => 'yes']);
        }elseif ($req->action == 'slide') {
            SlideShow::find($req->dataId)->delete();
            return response()->json(['message' => 'Your data has been removed', 'status' => 'yes']);
        }
    }

    // option get search data 
    public function getSearch(Request $req){
        $data = [];
        if ($req->action == 'province') {
            foreach (Province::where('country_id', $req->dataId)->get() as $key => $pro) {
                $data[] = [
                    'id' => $pro->id,
                    'title' => $pro->province_name
                ];
            }
            return response()->json(['data' => $data, 'status' => 'yes']);
        }
    }
}
