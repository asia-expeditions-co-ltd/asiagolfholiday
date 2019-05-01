<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class CountView extends Model
{
     protected $table = 'tbl_countview';

       public static function Getdate($getde, $ip, $tour_id){
       return self::where(['created_at'=> $getde, 'ip'=> $ip, 'tour_id'=> $tour_id])->first();
    }

        public function tour(){
    	return $this->belongsTo(Tour::class);
    }

     public static  function getcount_viewTours(){
         $data = DB::table('tbl_countview as v')
    ->select(DB::Raw('t.tour_name as title, count(*) as total, v.tour_id'))
    ->groupBy(DB::raw('(title)'))
    ->join('tours as t', 'v.tour_id', '=', 't.id')
    ->get();

       return $data;
    }


}
