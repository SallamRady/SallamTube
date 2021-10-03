<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('landing_page');

Auth::routes();



Route::group(['middleware'=>'guest:web'],function(){
    /** User Login  **/
    Route::get('user_login','Site\LoginController@login')->name('user_login');
    Route::post('user_login','Site\LoginController@check_user_login')->name('check_user_login');

    /** Register **/
    Route::get('user_register','Site\RegisterController@index')->name('user_register');
    Route::post('user_register_create','Site\RegisterController@create')->name('user_register_create');
    Route::post('add_message','Dashboard\MessagesController@add_message')->name('add_message');

    Route::get('show_page/{id}','Site\SiteController@show_page')->name('show_page');

});


Route::group(['middleware'=>'auth:web'],function(){

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('category_videos/{id}', 'HomeController@category_videos')->name('category_videos');
    Route::get('skill_videos/{id}', 'HomeController@skill_videos')->name('skill_videos');

    Route::get('video_show/{id}', 'HomeController@video_show')->name('video_show');

    Route::post('add_comment','HomeController@add_comment')->name('add_comment');

    Route::post('edit_comment','HomeController@edit_comment')->name('edit_comment');

    Route::get('delete_comment/{id}','HomeController@delete_comment')->name('delete_comment');

    Route::get('userProfile','HomeController@userProfile')->name('userProfile');

    Route::post('update_user_profile','HomeController@update_user_profile')->name('update_user_profile');

    Route::get('User_logout','HomeController@logout')->name('User_logout');
});

