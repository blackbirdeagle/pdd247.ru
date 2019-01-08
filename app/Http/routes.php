<?php
/*
* Copyright by Alexander Afanasyev
* E-mail: blackbirdeagle@mail.ru
* Skype: al_sidorenko1
* */
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

Route::get('/', 'PddController@index');

Route::get('/bilety', 'PddController@bilety');
Route::get('/bilety/{id}', 'PddController@voprosy');

Route::get('/proverka/{bilet}/{vopros}', 'PddController@proverka');

Route::get('/result', 'PddController@result');
Route::get('/resultexam', 'PddController@resultExam');

Route::get('/pdd', 'PddController@pdd');
Route::get('/pdd/{seokey}', 'PddController@pddThem');

Route::get('/temy', 'PddController@thems');

Route::get('/temy/{id}', 'PddController@them');

Route::get('/exam', 'PddController@exam');

Route::get('/marafon', 'PddController@marafon');

Route::get('/tematic', 'PddController@tematic');
Route::get('/voprosy', 'PddController@nVoprosy');
Route::get('/voprosy/{id}', 'PddController@nVopros');

Route::get('/ajaxvopros', 'PddController@ajaxVopros');
Route::get('/ajaxotvet', 'PddController@ajaxOtvet');
Route::get('/ajaxsession', 'PddController@ajaxSession');
Route::get('/ajaxmenubilety', 'PddController@ajaxMenuBilety');
Route::get('/ajaxmenutemy', 'PddController@ajaxMenuTemy');
Route::get('/ajaxmenupdd', 'PddController@ajaxMenuPdd');
Route::get('/ajaxmenunv', 'PddController@ajaxMenuNv');
Route::get('/ajaxExamSession', 'PddController@ajaxExamSession');
Route::get('/ajaxContent', 'PddController@ajaxContent');
Route::get('/ajaxdop', 'PddController@ajaxDop');
Route::get('/errorCount', 'PddController@errorCount');
//Route::get('home', 'HomeController@index');
Route::get('/recent-changes', 'PddController@recentChanges');
Route::get('/send-comment', 'PddController@sendComment');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
