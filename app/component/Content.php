<?php

namespace App\component;



/**

* 

*/

class Content

{

	

	// function __construct(argument)

	// {

	// 	# code...

	// }

	public static $UrlBase = '/home3/asiagolf/public_html/asiagolftravel';

	public static $webUrl = '';
	public static function urlImage($fileName, $location ='/photos/share/thumbs/' ){

		if ( file_exists(public_path().$location.$fileName) ) {

            $image = ($fileName == '' ? '/img/noImage.gif' :static::$webUrl.$location.$fileName);

        }else if ( file_exists(static::$UrlBase.$location.$fileName) ) {

            $image = ($fileName == '' ? '/img/noImage.gif' : static::$webUrl.$location.$fileName);

        }else{

            $image = ($fileName == '' ? '/img/noImage.gif' : static::$webUrl.$location.$fileName);

        }    

        return $image;

	}

}