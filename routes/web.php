<?php

Route::get('/','adminController@adminLogin');
Route::post('login','adminController@adminCheckLogin')->name('login');
Route::get('dang-xuat.html','adminController@adminLogout');

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
    Route::get('xoa-loai-{id}.html','adminCategoryController@removeCategory');
    //Sản phẩm
    Route::get('danh-sach-san-pham.html','adminProductController@getProduct');
    Route::get('them-san-pham.html','adminProductController@addProduct');
    Route::post('them-san-pham.html','adminProductController@addPostProduct')->name('add_product');
    Route::get('sua-san-pham-{id}.html','adminProductController@editProduct');
    Route::post('sua-san-pham-{id}.html','adminProductController@editPostProduct');
    Route::get('xoa-san-pham-{id}.html','adminProductController@deleteProduct');
});

/***
 * API gọi từ app di động lên
 */
Route::post('app-login','ApiController@Login');
Route::post('register','ApiController@Register');
Route::get('getToken','ApiController@getToken');
Route::get('checkTokenApp','ApiController@checkTokenApp');