<?php



namespace App;



use Illuminate\Database\Eloquent\Model;



class Tour extends Model

{

    //

    protected $table = 'tours';



    public function web(){

    	return $this->belongsToMany(Web::class);

    }
      public function subscribe(){

        return $this->belongsTo(Subscribe::class);

    }

    public function category(){

        return $this->belongsToMany(Category::class);

    }

    public function country(){

    	return $this->belongsTo(Country::class);

    }

    public function province(){

    	return $this->belongsTo(Province::class);

    }

    public function user(){

    	return $this->belongsTo(User::class);

    }
    public function countview(){
        return $this->belongsTo(CountView::class);
    }

    public static function getcatTour( $cat_id, $web, $type = 1, $location = 126){

        return $users = \DB::table('tbl_tours as tour')

            ->join('tour_web as web', 'tour.id', '=', 'web.tour_id')

            ->join('category_tour as cat', 'tour.id', '=', 'cat.tour_id')

            ->where(['category_id'=>$cat_id, 'type'=>$type, 'web.web_id'=>$web,'tour.province_id'=>$location,'tour.status'=>1])

            ->paginate(12);    

    }

          public static function gettopplace(){
             $data = \DB::table('tbl_tours as tour')
    ->select(\DB::Raw('pro.id,tour.province_id as p_id , count(*) as total '))->
    groupBy(\DB::raw('(p_id),(pro.id)'))
    ->orderby('total', 'desc')
    ->join('province as pro', 'pro.id', '=', 'tour.province_id')
    ->where(['type'=>1,'status'=>1])->limit(6)
    ->get();

       return $data;
  
    }

    

}

