<?php

use Illuminate\Support\Facades\Auth;
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
    return view('index');
})->middleware('auth', 'web')->name('app');
Auth::routes();
Route::get('profile', 'Auth\AuthController@profile')->middleware('auth', 'web')->name('auth.profile');
Route::get('/home', function(){
    return view('index');
})->name('home');

Route::prefix('quan-ly-hoc-sinh')->group(function () {
    Route::get('/', 'QuanlyHocSinhController@index')->name('quan-ly-hoc-sinh-index');
    Route::get('/create', 'QuanlyHocSinhController@create')->name('quan-ly-hoc-sinh-create');
    Route::get('/edit/{id}', 'QuanlyHocSinhController@edit')->name('quan-ly-hoc-sinh-edit');
});

Route::prefix('quan-ly-khoi')->group(function () {
    Route::get('/', 'KhoiController@index')->name('quan-ly-khoi-index');
});
Route::prefix('danh-sach-lop')->group(function () {
    Route::get('/', 'LopController@index')->name('danh-sach-lop-index');
});


Route::prefix('cong-viec-hang-ngay')->group(function () {

    Route::view('/don-xin-nghi-hoc', 'don-xin-nghi-hoc.index')->name('test4');
    Route::view('/don-dan-thuoc', 'don-dan-thuoc.index')->name('test5');
    Route::view('/loi-nhan', 'loi-nhan.index')->name('test6');
    Route::view('/hoat-dong-hoc', 'hoat-dong-hoc.index')->name('test7');


    Route::prefix('diem-danh')->group(function () {
        Route::get('ban-sang', 'DiemDanhDen\DiemDanhDenController@showDiemDanh')->name('diem_danh_ban_sang.create');
        Route::post('ban-sang', 'DiemDanhDen\DiemDanhDenController@postDiemDanh')->name('diem_danh_ban_sang.store');

        Route::get('ban-chieu', 'DiemDanhDen\DiemDanhDenController@showDiemDanh')->name('diem_danh_ban_chieu.create');
        Route::post('ban-chieu', 'DiemDanhDen\DiemDanhDenController@postDiemDanh')->name('diem_danh_ban_chieu.store');

        Route::get('ve', 'DiemDanhVe\DiemDanhVeController@showDiemDanhVe')->name('diem_danh_ve.create');
        Route::post('ve', 'DiemDanhVe\DiemDanhVeController@postDiemDanhVe')->name('diem_danh_ve.store');
    });
});

Route::prefix('quan-ly-suc_khoe')->group(function () {
    Route::get('/', 'SucKhoeController@index')->name('quan-suc-khoe-index');
    Route::post('/check-dot-kham-suc-khoe', 'SucKhoeController@checkdot')->name('quan-suc-khoe-check-dot');
    Route::get('/create', 'SucKhoeController@create')->name('quan-suc-khoe-create');
    Route::post('/store', 'SucKhoeController@store')->name('quan-suc-khoe-store');
    Route::get('/edit/{id}', 'SucKhoeController@edit')->name('quan-suc-khoe-edit');
    Route::post('/update/{id}', 'SucKhoeController@update')->name('quan-suc-khoe-update');
});

Route::group(['middleware' => ['web', 'auth']], function () {

    Route::prefix('thong-bao')->group(function () {
        Route::get('/', 'ThongBaoController@index')->name('thong-bao.index');
        Route::get('/{id}', 'ThongBaoController@showThongBao')->name('thong-bao.show')->where('id', '[0-9]+');;
    });

    Route::post('changeType', 'NotificationController@changeType')->name('notification.changeType');

});
