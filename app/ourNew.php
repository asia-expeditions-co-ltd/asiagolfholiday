<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ourNew extends Model
{
    //
    protected $table = 'tbl_news';

    public function province(){
    	return self::belongsTo(Province::class);
    }

    public function user(){
    	return self::belongsTo(User::class);
    }
}
