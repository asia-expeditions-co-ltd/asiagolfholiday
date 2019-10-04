<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\Province;
use App\Country;
use App\GolfPackage;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {    
        if ($req->des_slug) {
            $data = Country::where('country_slug',$req->des_slug)->first();   
        }elseif ($req->pro_slug) {
            $data = Province::where('slug',$req->pro_slug)->first();
        }elseif ($req->des_golf_type) {         
            $data = \DB::table('golf_packages as golf')
                    ->groupBy('golf.country_id')
                    ->join('country as cnt', 'cnt.id', '=', 'golf.country_id')
                    ->where(['golf.type'=>$req->des_golf_type,'cnt.country_status'=>1])
                    ->get();

        }elseif ($req->limit) {
            $data = \DB::table('tbl_tours as tour')
                    ->groupBy('tour.province_id')
                    ->join('province as pro', 'pro.id', '=', 'tour.province_id')
                    ->join('country as coun', 'coun.id', '=', 'tour.country_id')
                    ->where(['type'=>1,'status'=>1])->limit($req->limit)
                    ->get();
        }else{
            $data = Country::where('country_status',1)->get();   
        }
        return Response()->json($data)->header('Access-Control-Allow-Origin', '*');       
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return 22222;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        return 33333;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //        return 123;
        return 44444;
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
        return 55555;
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
