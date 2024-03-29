<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


//--------------------|||||-- front end section -----|||||||----------




Route::get('/','HomeController@index');

Route::get('/500', function () {
  $home='home';
  return view('app', compact('home'));
});
Route::get('/contact-us', function () {
  return view('app');
});
Route::get('/golf-packages', function () {
	$GolfPackages='GolfPackages';
  return view('app', compact('GolfPackages'));
});
Route::get('/golf-item/{slug}', function ($slugs) {
  $slug=$slugs;
  return view('app', compact('slug'));
});
Route::get('/golf-courses-detail/{slug}', function ($slugs) {
  $slug=$slugs;
  return view('app', compact('slug'));
});
Route::get('/destinations', function () {
  return view('app');
});
Route::get('/golf-courses', function () {
	$GolfCourses='GolfCourses';
  return view('app', compact('GolfCourses'));
});
Route::get('/destinations/{url}', function ($urlname) {
	$urlname=$urlname;
  return view('app', compact('urlname'));
});


// social network
// Route::get('login/facebook', 'SocialController@redirectToProvider');
// Route::get('login/facebook/callback', 'SocialController@handleProviderCallback');

// Route::get('/', 'HomeController@getHome')->name('home');
// Route::get('/contact-us', 'HomeController@getContactUs')->name('getContact');
// Route::post('/sendcontact', 'HomeController@sendContact')->name('sendContact');

// Route::get('/golf-courses', 'HomeController@getGolfPackage')->name('destination');
// Route::get('/{country}/golf-courses', 'HomeController@getGolfCourse');
// Route::get('/{country}/{province}/{golfName}', 'HomeController@getGoflDetails')->name('golfDetails');
// Route::get('our-activities', 'HomeController@getActivity')->name('getActivity');
// Route::get('/activity/single/view/{new}', 'HomeController@singActivity')->name('singleActivity');
// Route::post('sent/requestteetime', 'HomeController@getRequestTeeTime')->name('sentTeeTime');
// Route::post('/subscribe', 'SubscribeController@subscribe')->name('subscribe');

Route::get('login', 'UserController@getLogin')->name('getLogin');
Route::post('doLogin', 'UserController@doLogin')->name('doLogin');
Route::get('signout', 'UserController@signout')->name('signout');

// ------------End front End ---------------- ||||-----------------


// -------------------------Back End Section ----------------------||||

Route::group(['middleware'=> 'isAdmin'], function(){
	Route::group(['prefix' => 'admin'], function(){
		
		Route::get('/', 'AdminController@getDashboard');
		Route::get('/user', 'UserController@getUser')->name('getUser');
		Route::get('/user/add/new', 'UserController@getUserForm')->name('getcreateUser');
		Route::post('/user/add/create', 'UserController@createUser')->name('createUser');
		Route::get('/user/edit/{id}', 'UserController@geteditUser');
		Route::post('user/update/user', 'UserController@updateUser')->name('updateUser');

		// option delete all 
		Route::get('/delete', 'AdminController@deleteOption')->name('getDelete');
		Route::get('/searchData', 'AdminController@getSearch')->name('getSearch');

		Route::get('/ournew', 'OurNewsController@getOurNew')->name('getOurNew');
		Route::get('/ournew/add/new', 'OurNewsController@getForm')->name('getForm');
		Route::post('ournew/create/new', 'OurNewsController@createNew')->name('createNew');
		Route::get('/ournew/edit/new/{id}', 'OurNewsController@getUpdateNew')->name('getUpdateNew');
		Route::post('/ounnew/update/new', 'OurNewsController@UpdateNew')->name('UpdateNew');

		// Golf packages
		Route::get('golf', 'GolfController@getGolf')->name('golf');
		Route::get('golf/new/golf', 'GolfController@getGolfForm')->name('getGolfForm');
		Route::post('golf/create/new/golf', 'GolfController@createGolf')->name('createGolf');
		Route::get('golf/update/golf/{id}', 'GolfController@getGoflEdit')->name('getGoflEdit');
		Route::post('golf/update/golf', 'GolfController@updateGolf')->name('updateGolf');

		// golf destination
		Route::get('country', 'DestinationController@countryList')->name('countryList');
		Route::get('country/add/country', 'DestinationController@getCountry')->name('getCountry');
		Route::post('country/create/country', 'DestinationController@createCountry')->name('createCountry');
		Route::get("country/update/country/{id}", 'DestinationController@getCountryEdit')->name('getCountryEdit');
		Route::post('country/update/country', 'DestinationController@updateCountry')->name('updateCountry');

		// proivince 
		Route::get('province', 'DestinationController@provinceList')->name('provinceList');
		Route::get('/province/create/add', 'DestinationController@createProvince')->name('createProvince');
		Route::post('/province/create/store', 'DestinationController@createProvinceStore')->name('createProvinceStore');
		Route::get('/province/update/province/{proivince}', 'DestinationController@updateProvince')->name('updateProvince');
		Route::post('/province/update/province/edit', 'DestinationController@editProvince')->name('editProvince');

		Route::get('slide', 'SlideController@getSlide')->name('getSlide');
		Route::get('slide/new/slide', 'SlideController@getSlideForm')->name('slideForm');
		Route::post('slide/create/slide', 'SlideController@createSlide')->name('createSlide');

		Route::get('/subscribeemail', 'SubscribeController@getsubcribe')->name('getsubcribe');
		Route::get('/delatesubscribe', 'SubscribeController@deletesubcribe')->name('deletesubcribe');
		Route::get('/count_view', 'SubscribeController@getcount')->name('getcount');
		Route::post('/delet_datal', 'AdminController@delete_data')->name('delete_data_sub');
		Route::post('/delete_count', 'AdminController@delete__counting')->name('delete__counting');
	});
});

// --------------------------End Back End section -------------------|||






