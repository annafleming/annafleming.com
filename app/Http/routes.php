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

Route::get('/', 'HomeController@index');

Route::resource('contact', 'ContactController');

Route::get('/cv/download', 'ResumeController@download');
Route::resource('cv', 'ResumeController');

Route::resource('works', 'WorksController', array('except' => array('show')));
Route::get('/works/manage', 'WorksController@manage');

Route::resource('practical', 'PracticalSkillsController', array('except' => array('show')));
Route::get('/practical/move/{id}/{direction}', 'PracticalSkillsController@move')->where('direction', 'up|down');

Route::resource('categories', 'CategoriesController', array('except' => array('show', 'index')));
Route::get('/categories/move/{id}/{direction}', 'CategoriesController@move')->where('direction', 'up|down');

Route::resource('skills', 'SkillsController', array('except' => array('show')));
Route::get('/skills/move/{id}/{direction}', 'SkillsController@move')->where('direction', 'up|down');

Route::resource('languages', 'LanguagesController', array('except' => array('show')));
Route::get('/languages/move/{id}/{direction}', 'LanguagesController@move')->where('direction', 'up|down');

Route::resource('history', 'HistoryController', array('except' => array('show')));
Route::get('/history/move/{id}/{direction}', 'HistoryController@move')->where('direction', 'up|down');

Route::resource('config', 'ConfigController', array('except' => array('show')));


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('sitemap.xml', function(){
    $sitemap = App::make("sitemap");
    $sitemap->add(URL::to('/'), '2015-01-08T20:10:00+02:00', '1.0', 'monthly');
    $sitemap->add(URL::to('works'), '2015-01-08T20:10:00+02:00', '0.9', 'monthly');
    $sitemap->add(URL::to('cv'), '2015-01-08T20:10:00+02:00', '0.9', 'monthly');
    $sitemap->add(URL::to('contact'), '2015-01-08T20:10:00+02:00', '0.8', 'yearly');
    return $sitemap->render('xml');

});