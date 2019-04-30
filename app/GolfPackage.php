<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GolfPackage extends Model
{
    //
    protected $table = 'golf_packages';

    public function country(){
    	return self::belongsTo(Country::class);
    }

    public function province(){
    	return self::belongsTo(Province::class,  'province_id');
    }

    public function user(){
    	return self::belongsTo(User::class);
    }


}
