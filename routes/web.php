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
Route::get('/', 'HomeController@index')->middleware('auth', 'web', 'checkClass')->name('app');
Auth::routes();
Route::get('/home', 'HomeController@index')->middleware('auth', 'web', 'checkClass')->name('home');
Route::group(['middleware' => ['web','auth']], function () {
        Route::get('profile', 'Auth\AuthController@profile')->middleware('auth', 'web')->name('profile');
        Route::post('/upload-avatar','Auth\AuthController@uploadAvatar')->name('upload-avatar');
        Route::get('/doi-mat-khau','Auth\AuthController@changePasswordForm')->name('doi-mat-khau');
        Route::post('/update-mat-khau','Auth\AuthController@changePassword')->name('update-mat-khau');
});

Route::get('/logout','Auth\AuthController@getLogout')->name('get.logout');

Route::group(['middleware' => ['web', 'auth', 'checkClass']], function () {

    Route::prefix('quan-ly-hoc-sinh')->group(function () {
        Route::get('/', 'QuanlyHocSinhController@index')->name('quan-ly-hoc-sinh-index');
        Route::get('/create', 'QuanlyHocSinhController@create')->name('quan-ly-hoc-sinh-create');
        Route::get('/edit/{id}', 'QuanlyHocSinhController@edit')->name('quan-ly-hoc-sinh-edit');
    });

    Route::prefix('quan-ly-khoi')->group(function () {
        Route::get('/', 'KhoiController@index')->name('quan-ly-khoi-index');
    });

    Route::prefix('cong-viec-hang-ngay')->group(function () {

        Route::group(['namespace' => 'DonNghiHoc'], function() {
            Route::get('/don-nghi-hoc', 'DonNghiHocController@index')->name('don-xin-nghi-hoc');
        });

        Route::group(['namespace' => 'DonDanThuoc'], function() {
            Route::get('/don-dan-thuoc', 'DonDanThuocController@index')->name('don-dan-thuoc');
            Route::post('/gui-phan-hoi-don-dan-thuoc', 'DonDanThuocController@guiPhanHoi')->name('gui-phan-hoi-don-dan-thuoc');
            Route::post('/get-info-phan-hoi', 'DonDanThuocController@infoPhanHoi')->name('info-phan-hoi');
        });

        Route::prefix('diem-danh')->group(function () {
            Route::get('ban-sang', 'DiemDanhDen\DiemDanhDenController@showDiemDanh')->name('diem_danh_ban_sang.create');
            Route::post('ban-sang', 'DiemDanhDen\DiemDanhDenController@postDiemDanh')->name('diem_danh_ban_sang.store');

            Route::get('ban-chieu', 'DiemDanhDen\DiemDanhDenController@showDiemDanh')->name('diem_danh_ban_chieu.create');
            Route::post('ban-chieu', 'DiemDanhDen\DiemDanhDenController@postDiemDanh')->name('diem_danh_ban_chieu.store');

            Route::get('ve', 'DiemDanhVe\DiemDanhVeController@showDiemDanhVe')->name('diem_danh_ve.create');
            Route::post('ve', 'DiemDanhVe\DiemDanhVeController@postDiemDanhVe')->name('diem_danh_ve.store');
        });


        Route::prefix('hoat-dong-hoc')->group(function () {
            Route::get('/', 'HoatDongController@index')->name('hoat-dong-hoc-index');
            Route::post('nhap-file-hoat-dong', 'HoatDongController@store')->name('nhap-file-hoat-dong');
        });
    });

    Route::prefix('quan-ly-suc-khoe')->group(function () {
        Route::get('/', 'SucKhoeController@index')->name('quan-suc-khoe-index');
        Route::post('/check-dot-kham-suc-khoe', 'SucKhoeController@checkdot')->name('quan-suc-khoe-check-dot');
        Route::get('/create', 'SucKhoeController@create')->name('quan-suc-khoe-create');
        Route::post('/store', 'SucKhoeController@store')->name('quan-suc-khoe-store');
        Route::get('/edit/{id}', 'SucKhoeController@edit')->name('quan-suc-khoe-edit');
        Route::post('/update/{id}', 'SucKhoeController@update')->name('quan-suc-khoe-update');
        Route::post('/show-dot-suc-khoe', 'SucKhoeController@ShowSucKhoeTheoDot')->name('show-dot-suc-khoe');
    });

    Route::prefix('danh-sach-lop')->group(function () {
        Route::get('/', 'LopController@index')->name('danh-sach-lop-index');
    });

    Route::post('changeType', 'NotificationController@changeType')->name('notification.changeType');

    Route::get('/album-anh', 'AlbumController@index')->name('album.index');
    Route::get('/album-anh/fillter', 'AlbumController@fillter')->name('album.fillter');
    Route::get('/album-anh/{id}', 'AlbumController@show')->name('album.show');
    Route::post('storeAlbum', 'AlbumController@store')->name('album.store');
    Route::post('fileUpload', 'AlbumController@fileUpload')->name('album.upload');
    Route::get('removeUpload', 'AlbumController@removeUpload')->name('album.remove');
    Route::post('removeImage', 'AlbumController@removeImage')->name('album.removeImage');
    Route::post('updateTitle', 'AlbumController@updateTitle')->name('album.updateTitle');
    Route::post('addImage', 'AlbumController@addImage')->name('album.addImage');

    Route::get('nhan_xet', 'NhanXetController@index')->name('nhanxet.index');  
    Route::post('nhan_xet', 'NhanXetController@store')->name('nhanxet.store');  
    Route::post('find', 'NhanXetController@find')->name('nhanxet.find');
});

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::prefix('thong-bao')->group(function () {
        Route::get('/', 'ThongBaoController@index')->name('thong-bao.index');
        Route::get('/create', 'ThongBaoController@create')->name('thong-bao.create')->middleware('checkClass');
        Route::post('/store', 'ThongBaoController@store')->name('thong-bao.store')->middleware('checkClass');
        Route::get('/{id}', 'ThongBaoController@showThongBao')->name('thong-bao.show')->where('id', '[0-9]+');
        Route::get('/thong-bao-da-gui', 'ThongBaoController@thongBaoDaGui')->name('thong-bao.da-gui');
        Route::get('/show/{id}', 'ThongBaoController@showThongBaoGuiDi')->name('thong-bao.showThongBaoGuiDi')->where('id', '[0-9]+');
        Route::post('/remove', 'ThongBaoController@remove')->name('thong-bao.remove');
        Route::post('/xoa-thong-bao-gui-di', 'ThongBaoController@removeThongBaoGuiDi')->name('thong-bao.removeThongBaoGuiDi');
    });
});

Route::view('OTP', 'auth.passwords.forgot_OTP')->name('otp.forget_password');
Route::post('send-otp', "Auth\SendOTPController@send")->name('otp.send');
Route::post('check-otp', "Auth\SendOTPController@checkOTP")->name('otp.check');
Route::post('reset-otp', "Auth\SendOTPController@resetOTP")->name('otp.reset');
