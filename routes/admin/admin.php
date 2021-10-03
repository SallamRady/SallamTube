<?php

use Illuminate\Support\Facades\Route;

define('PAGINATION_COUNT',10);

Route::group(['prefix'=>'admin'],function (){

    Route::group(['middleware'=>'guest:admin'],function(){

        /** These Routes can visit via normal guest to login - check login **/
        Route::get('admin_login','LoginController@login')->name('admin_login');
        Route::post('check_login','LoginController@check_admin_login')->name('check_admin_login');

    });

    Route::group(['middleware'=>'auth:admin'],function(){
        /** These Routes can visit via only admins **/
        Route::get('dashboard','DashboardController@index')->name('dashboard');

        /** Users Management **/
        Route::resource('users','UserController');

        /** Categories Management **/
        Route::resource('categories','CategoriesController');

        /** Skills Management **/
        Route::resource('skills','SkillsController');

        /** Tags Management **/
        Route::resource('tags','TagsController');

        /** Tags Management **/
        Route::resource('pages','PagesController');

        /** Videos Management **/
        Route::resource('videos','VideoController');

        /** Add Comment **/
        Route::post('store_Comment','CommentController@store_Comment')->name('store_Comment');

        /** edit Comment **/
        Route::get('UpdateComment/{id}','CommentController@UpdateComment')->name('UpdateComment');

        /** Delete Comment **/
        Route::get('deleteComment/{id}','CommentController@deleteComment')->name('deleteComment');
        Route::get('deleteComment_from_CP/{id}','CommentController@deleteComment_from_CP')->name('deleteComment_from_CP');

        /** comment_update **/
        Route::post('comment_update/{id}','CommentController@comment_update')->name('comment_update');

        /****/
        Route::get('messages','MessagesController@index')->name('messages.index');

        Route::get('repeat_messages/{id}','MessagesController@repeat')->name('repeat_messages');

        Route::post('send_repeat','MessagesController@send_repeat')->name('send_repeat');

        Route::get('admin_logout','DashboardController@admin_logout')->name('admin_logout');
    });

});
