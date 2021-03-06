<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/',function(){
	echo "Routes <br>";
	echo "/request<br>";
	echo "/postdata<br>";
	echo "/json <br>";
});
Route::get('request', function()
{
	return View::make('getemail');
});

Route::post('request',array('uses'=>'SurveyAccessController@index'));
Route::get('builder/{token}/{username}/1','SurveyAccessController@giveAccess');

Route::get('game/{token}/{username}/1',function ()
{
	return View::make('game');
});
//SURVEY RESPONSE POST
// Route::get('postdata',function(){
// 	return View::make('testpost');
// });
Route::get('postdata',array('as'=>'postdata','uses'=>'DemoController@filter'));
//Testing
Route::get('g',function ()
{
	return View::make('game');
});
Route::get('json','JsonTableController@show');
ROute::post('json','JsonTableController@getjson');
Route::get('t',function ()
{
	 Response::json(array("status"=>"cool"));
});


// EMBED API

Route::group(array('prefix'=>'api/v1'),function()
{
	Route::resource("survey",'EmbedController');
	});


//TEST

Route::get("apitest","TestController@index");