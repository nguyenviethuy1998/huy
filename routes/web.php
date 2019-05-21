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

Route::get('/', function () {
    return redirect()->route('trangchu');
});

Route::get('/trangchu', 'trangchuController@index')->name('trangchu');
Route::get('/sanpham/{id}/detail.html', 'trangchuController@productDetail')->name('productDetail');
Route::get('/trangchu/nhomsanpham/{id}/category.html', 'timkiemController@xemtheonhomsp')->name('xemtheonhom');
Route::get('/trangchu/loaisanpham/{id}/category.html', 'timkiemController@xemtheoloaisp')->name('xemtheoloai');
Route::post('/timkiem/{id}/category.html', 'timkiemController@timkiemsanphamtheoloai')->name('timkiemsanphamtheoloai');


Route::get('/cart', 'CartController@cart')->name('cart');
Route::get('/cart/view', 'CartController@view')->name('cart.view');
Route::get('/cart/destroy', 'CartController@destroy')->name('cart.destroy');
Route::get('/cart/order', 'CartController@order')->name('cart.order');
Route::post('/cart/pay', 'CartController@pay')->name('cart.pay');


Route::get('/category', 'trangchuController@category')->name('category');

//admin
Route::group(['prefix'=>'admin','middleware'=>'admin'],function () {

//    Route::get('/', function (){ return view('admin.index'); })->name('admin.index');

    Route::group(['prefix'=>'nhom',],function () {
        Route::get('/', 'NhomsanphamController@index')->name("nhom.index");
        Route::get('/create', 'NhomsanphamController@create')->name("nhom.create");
        Route::post('/create', 'NhomsanphamController@store')->name("nhom.store");
        Route::get('/edit/{nhom}', 'NhomsanphamController@edit')->name("nhom.edit");
        Route::put('/edit/{nhom}', 'NhomsanphamController@update')->name("nhom.update");
        Route::delete('/delete/{id}','NhomsanphamController@destroy')->name("nhom.destroy");
    });
    Route::group(['prefix'=>'loai'],function () {
        Route::get('/', 'LoaisanphamController@index')->name("loai.index");
        Route::get('/create', 'LoaisanphamController@create')->name("loai.create");
        Route::post('/create', 'LoaisanphamController@store')->name("loai.store");
        Route::get('/edit/{loai}', 'LoaisanphamController@edit')->name("loai.edit");
        Route::put('/edit/{loai}', 'LoaisanphamController@update')->name("loai.update");
        Route::delete('/delete/{id}','LoaisanphamController@destroy')->name("loai.destroy");
    });
    Route::group(['prefix'=>'nhacungcap'],function () {
        Route::get('/', 'NhacungcapController@index')->name("nhacungcap.index");
        Route::get('/create', 'NhacungcapController@create')->name("nhacungcap.create");
        Route::post('/create', 'NhacungcapController@store')->name("nhacungcap.store");
        Route::get('/edit/{nhacungcap}', 'NhacungcapController@edit')->name("nhacungcap.edit");
        Route::put('/edit/{nhacungcap}', 'NhacungcapController@update')->name("nhacungcap.update");
        Route::delete('/delete/{id}','NhacungcapController@destroy')->name("nhacungcap.destroy");
    });
    Route::group(['prefix'=>'sanpham'],function () {
        Route::get('/', 'SanphamController@index')->name("sanpham.index");
        Route::get('/create', 'SanphamController@create')->name("sanpham.create");
        Route::post('/create', 'SanphamController@store')->name("sanpham.store");
        Route::get('/edit/{sanpham}', 'SanphamController@edit')->name("sanpham.edit");
        Route::put('/edit/{sanpham}', 'SanphamController@update')->name("sanpham.update");
        Route::delete('/delete/{id}','SanphamController@destroy')->name("sanpham.destroy");
    });
    Route::group(['prefix'=>'users'],function () {
        Route::get('/', 'NguoidungController@index')->name("users.index");
        Route::get('/create', 'NguoidungController@create')->name("users.create");
        Route::post('/create', 'NguoidungController@store')->name("users.store");
        Route::get('/edit/{users}', 'NguoidungController@edit')->name("users.edit");
        Route::put('/edit/{users}', 'NguoidungController@update')->name("users.update");
        Route::delete('/delete/{users}','NguoidungController@destroy')->name("users.destroy");
    });
    Route::group(['prefix'=>'phieunhap'],function () {
        Route::get('/', 'PhieunhapController@index')->name("phieunhap.index");
        Route::get('/create', 'PhieunhapController@create')->name("phieunhap.create");
        Route::post('/create', 'PhieunhapController@store')->name("phieunhap.store");
        Route::get('/edit/{phieunhap}', 'PhieunhapController@edit')->name("phieunhap.edit");
        Route::put('/edit/{phieunhap}', 'PhieunhapController@update')->name("phieunhap.update");
        Route::delete('/delete/{phieunhap}','PhieunhapController@destroy')->name("phieunhap.destroy");
    });
    Route::group(['prefix'=>'dondathang'],function () {
        Route::get('/', 'DondathangController@index')->name("dondathang.index");
        Route::get('/xử lý', 'DondathangController@getxulydondathang')->name("dondathang.getxulydondathang");
        Route::PUT('/xử lý/{dondathang}', 'DondathangController@xulydondathang')->name("dondathang.xulydondathang");
        Route::get('/xuất đơn', 'DondathangController@getxuatdondathang')->name("dondathang.getxuatdondathang");
        Route::PUT('/xuất đơn/{dondathang}', 'DondathangController@xuatdondathang')->name("dondathang.xuatdondathang");
        Route::get('/giao đơn', 'DondathangController@getgiaodondathang')->name("dondathang.getgiaodondathang");
        Route::PUT('/giao đơn/{dondathang}', 'DondathangController@giaodondathang')->name("dondathang.giaodondathang");
    });
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
