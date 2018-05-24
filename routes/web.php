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
    Route::get('check-san-pham-moi-{id}.html','adminProductController@checkNewProduct');
    Route::post('them-san-pham.html','adminProductController@addPostProduct')->name('add_product');
    Route::get('sua-san-pham-{id}.html','adminProductController@editProduct');
    Route::post('sua-san-pham-{id}.html','adminProductController@editPostProduct');
    Route::get('xoa-san-pham-{id}.html','adminProductController@deleteProduct');
    //Quản lí đơn hàng
    Route::get('danh-sach-don-hang.html','adminOrderController@getAllOrderSuccess');//đã giao
    Route::get('don-hang-chua-giao.html','adminOrderController@getAllOrderWating');//chưa giao
    Route::get('chuyen-trang-thai-{id}.html','adminOrderController@changeStatus');
    Route::get('huy-don-{id}.html','adminOrderController@removeOrder');
    Route::get('xuat-exel.html','adminOrderController@exportExel');
    Route::post('xuat-exel.html','adminOrderController@exportPostExel')->name('post_export_exel');
    Route::get('chi-tiet-don-hang-{id}.html','adminOrderController@detailOrder');
});

/***
 * API gọi từ app di động lên
 */
Route::post('app-login','ApiController@Login');
Route::post('register','ApiController@Register');
Route::get('getToken','ApiController@getToken');
Route::get('checkTokenApp','ApiController@checkTokenApp');

Route::group(['middleware' => 'appMiddleware'], function() {
    //Lấy sản phẩm trang home
    Route::get('/allProduct','apiProductController@getAllProduct');
    //Lấy thông tin sản phẩm
    Route::get('/getDetailProduct','apiProductController@getDetailProduct');
    //Tìm kiếm sản phẩm
    Route::get('/searchProduct','apiProductController@searchProduct');
    //Lấy thông tin người dùng từ token
    Route::get('/getDetailFromToken','apiUserController@getDetailFromToken');
    //Cập nhập thông tin ng dùng
    Route::post('UpdateDetailFromToken','apiUserController@updateDetailFromToken');
    //Đặt hàng
    Route::post('Order','apiOrderController@postOrder');
    //Lấy thông tin đơn hàng
    Route::get('/getOrderHistory','apiOrderController@getOrderHistory');
});
//Lấy loại sản phẩm
Route::get('/getCategory','apiCategoryController@getCategory');
//Lấy sản phẩm mới
Route::get('/newProduct','apiProductController@getNewProduct');
