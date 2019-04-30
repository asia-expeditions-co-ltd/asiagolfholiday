<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    //
    protected $table = 'province';

    public function golf(){
    	return self::hasMany(GolfPackage::class, 'id');
    }

    public function ournew(){
    	return self::hasMany(ourNew::class);
    }
}
