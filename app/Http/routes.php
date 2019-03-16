<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$active_multilang = defined('CNF_MULTILANG') ? CNF_LANG : 'en'; 
 \App::setLocale($active_multilang);
 if (defined('CNF_MULTILANG') && CNF_MULTILANG == '1') {

    $lang = (\Session::get('lang') != "" ? \Session::get('lang') : CNF_LANG);
    \App::setLocale($lang);
}   

Route::get('/', 'HomeController@index');
Route::controller('home', 'HomeController');

Route::controller('/user', 'UserController');
include('pageroutes.php');
include('moduleroutes.php');

Route::get('/restric',function(){

	return view('errors.blocked');

});
 
Route::resource('sximoapi', 'SximoapiController'); 
Route::group(['middleware' => 'auth'], function()
{

	Route::get('core/elfinder', 'Core\ElfinderController@getIndex');
	Route::post('core/elfinder', 'Core\ElfinderController@getIndex'); 
	Route::controller('/dashboard', 'DashboardController');
	Route::controllers([
		'core/users'		=> 'Core\UsersController',
		'notification'		=> 'NotificationController',
		'post'				=> 'PostController',
		'core/logs'			=> 'Core\LogsController',
		'core/pages' 		=> 'Core\PagesController',
		'core/groups' 		=> 'Core\GroupsController',
		'core/template' 	=> 'Core\TemplateController',
		'core/posts'		=> 'Core\PostsController',
		'core/forms'		=> 'Core\FormsController'
	]);
        
  //     Route::resource('principal', 'PrincipalController');
        

});	

Route::group(['middleware' => 'auth' , 'middleware'=>'sximoauth'], function()
{

	Route::controllers([
		'sximo/menu'		=> 'Sximo\MenuController',
		'sximo/config' 		=> 'Sximo\ConfigController',
		'sximo/module' 		=> 'Sximo\ModuleController',
		'sximo/tables'		=> 'Sximo\TablesController',
		'sximo/code'		=> 'Sximo\CodeController'
	]);			

  Route::resource('allposts', 'Post1Controller@allposts');
             Route::resource('searchcategory', 'Post1Controller@searchcategory');
             Route::resource('searchprincipal', 'Post1Controller@searchprincipal');
             Route::resource('searchprincipalclass', 'Post1Controller@searchprincipalclass');
             Route::resource('searcheventtype', 'Post1Controller@searcheventtype');
             Route::resource('searchevent', 'Post1Controller@searchevent');
             Route::resource('searcheveattendee', 'Post1Controller@searcheveattendee');
             Route::resource('searchregistration', 'Post1Controller@searchregistration');
             Route::resource('searchcommonissue', 'Post1Controller@searchcommonissue');
             Route::resource('searchvendor', 'Post1Controller@searchvendor');
             Route::resource('searchtaxclass', 'Post1Controller@searchtaxclass');
              Route::resource('searchtaxmaster', 'Post1Controller@searchtaxmaster');
               Route::resource('searchhsnmaster', 'Post1Controller@searchhsnmaster');
                Route::resource('searchprincipalpartner', 'Post1Controller@searchprincipalpartner');
                 Route::resource('searchlocation', 'Post1Controller@searchlocation');
             Route::resource('searchwarehouse', 'Post1Controller@searchwarehouse');
             Route::resource('searchdiscountlist', 'Post1Controller@searchdiscountlist');
                Route::resource('searchproductgroup', 'Post1Controller@searchproductgroup');
                 Route::resource('searchproduct', 'Post1Controller@searchproduct');
                 Route::resource('searchfinancialyear', 'Post1Controller@searchfinancialyear');
                  Route::resource('searchdelivery', 'Post1Controller@searchdelivery');
});

  Route::resource('allposts', 'Post1Controller@allposts');
             Route::resource('searchcategory', 'Post1Controller@searchcategory');
             Route::resource('searchprincipal', 'Post1Controller@searchprincipal');
             Route::resource('searchprincipalclass', 'Post1Controller@searchprincipalclass');
             Route::resource('searcheventtype', 'Post1Controller@searcheventtype');
             Route::resource('searchevent', 'Post1Controller@searchevent');
             Route::resource('searcheveattendee', 'Post1Controller@searcheveattendee');
             Route::resource('searchregistration', 'Post1Controller@searchregistration');
             Route::resource('searchcommonissue', 'Post1Controller@searchcommonissue');
             Route::resource('searchvendor', 'Post1Controller@searchvendor');
             Route::resource('searchtaxclass', 'Post1Controller@searchtaxclass');
              Route::resource('searchtaxmaster', 'Post1Controller@searchtaxmaster');
               Route::resource('searchhsnmaster', 'Post1Controller@searchhsnmaster');
                Route::resource('searchprincipalpartner', 'Post1Controller@searchprincipalpartner');
                 Route::resource('searchlocation', 'Post1Controller@searchlocation');
             Route::resource('searchwarehouse', 'Post1Controller@searchwarehouse');
             Route::resource('searchdiscountlist', 'Post1Controller@searchdiscountlist');
                Route::resource('searchproductgroup', 'Post1Controller@searchproductgroup');
                 Route::resource('searchproduct', 'Post1Controller@searchproduct');
                 Route::resource('searchfinancialyear', 'Post1Controller@searchfinancialyear');
                  Route::resource('searchdelivery', 'Post1Controller@searchdelivery');



