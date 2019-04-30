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

	public static function urlImage($fileName, $location ){

		if ($fileName) {

			$image = $location.'/'.$fileName;

		}else{

			$image = '/img/noimage.gif';

		}

		return $image;

	}

}