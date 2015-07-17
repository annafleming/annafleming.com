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

Route::get('/works/manage', 'WorksController@manage');
Route::resource('works', 'WorksController');
Route::resource('contact', 'ContactController');
Route::resource('cv', 'ResumeController');

Route::get('/practical/move/{id}/{direction}', array(
    'as' => 'practical.move',
    'uses' => 'PracticalSkillsController@move'
));
Route::resource('practical', 'PracticalSkillsController');
Route::resource('skillcategory', 'SkillCategoryController');

Route::get('/skillcategory/move/{id}/{direction}', array(
    'as' => 'skillcategory.move',
    'uses' => 'SkillCategoryController@move'
));

Route::resource('skills', 'SkillsController');

Route::get('/skills/move/{id}/{direction}', array(
    'as' => 'skills.move',
    'uses' => 'SkillsController@move'
));

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
