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

Route::get('/','adminController@adminLogin');
Route::post('login','adminController@adminCheckLogin')->name('login');

Route::group(['prefix' => 'admin','middleware'=>'checkLogin'], function() {
    Route::get('trang-chu.html','adminController@adminHome')->name('home');
    //Thông tin tài khoản
    Route::get('thong-tin-admin.html','adminController@adminDetail');
    Route::post('thong-tin-admin.html','adminController@adminPostDetail')->name('post_detail_admin');
    //Loại
    Route::get('danh-sach-loai.html','adminCategoryController@getCategory');
    Route::get('them-loai.html','adminCategoryController@addCategory');
    Route::post('them-loai.html','adminCategoryController@addPostCategory')->name('add_category');
    Route::get('sua-loai-{id}.html','adminCategoryController@editCategory');
    Route::post('sua-loai-{id}.html','adminCategoryController@editPostCategory');
    // Route::post('them-loai.html','adminCategoryController@addPostCategory')->name('add_category');
    Route::get('xoa-loai-{id}.html','adminCategoryController@removeCategory');
});
