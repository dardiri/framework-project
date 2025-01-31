<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\KategoriPekerjaanAdminController;
use App\Http\Controllers\PenyediaKerjaAdminController;
use Illuminate\Support\Facades\Auth;

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

Route::get('login', 'LoginController@login')->name('login.login');
Route::post('auth','LoginController@authCheck')->name('login.auth');
Route::get('registrasi', 'LoginController@register')->name('login.regist');
Route::get('forget-password', 'LoginController@forgetPassword')->name('login.forgetPassword');
Route::post('forget-password-sent', 'LoginController@forgetPasswordSent')->name('login.forgetPasswordSent');
Route::get('reset-password/{email}/{token}', 'LoginController@resetPassword')->name('login.resetPassword');
Route::post('change-password', 'LoginController@changePassword')->name('login.changePassword');
Route::post('store', 'LoginController@store')->name('login.store');
Route::post('logout','LoginController@logout')->name('login.logout');
Route::get('verify-email/{email}','LoginController@verifyEmail')->name('email.verify');

// Route Job
Route::get('/', 'UserPencariController@jobIndex');
Route::get('/job-list', 'UserPencariController@jobList');
Route::get('/{id}/detail-job', 'UserPencariController@detailJob' )->name('jobdetail');
Route::post('jobapply', 'UserPencariController@jobApply' )->name('applyjob');

Route::prefix('pencari')->group(function () {
    Route::get('', 'UserPencariController@index');
    Route::get('data-pencari', 'UserPencariController@pencari')->name('pencari.data');
    Route::get('data-pencari/add', 'UserPencariController@pencariAdd')->name('pencari.add');
    Route::get('data-pencari/edit', 'UserPencariController@pencariEdit')->name('pencari.edit');
    Route::get('data-pencari/show', 'UserPencariController@pencariShow')->name('pencari.show');

    Route::post('getkota', 'UserPencariController@getKota')->name('pencari.kota');
    Route::post('getkecamatan', 'UserPencariController@getKecamatan')->name('pencari.kecamatan');
    Route::post('getkelurahan', 'UserPencariController@getKelurahan')->name('pencari.kelurahan');

    Route::post('store', 'UserPencariController@store')->name('pencari.store');
    Route::post('update', 'UserPencariController@update')->name('pencari.update');

    Route::get('lamaran', 'UserPencariController@lamaran')->name('pencari.lamaran');
    Route::delete('lamaran/{id}/delete', 'UserPencariController@lamaranDelete')->name('pencari.lamaran.delete');
});


Route::prefix('perusahaan')->group(function () {
    Route::get('', 'PerusahaanController@index');
    Route::get('profile', 'PerusahaanController@profile')->name('perusahaan.profile');
    Route::get('profile-edit', 'PerusahaanController@profileEdit')->name('perusahaan.profile-edit');
    Route::post('profile-update', 'PerusahaanController@profileUpdate')->name('perusahaan.profile-update');
    Route::post('pass-update', 'PerusahaanController@updatePassword')->name('perusahaan.profile-pass');
    Route::get('data-perusahaan', 'PerusahaanController@perusahaan')->name('perusahaan.data');
    Route::get('data-perusahaan/add', 'PerusahaanController@perusahaanAdd')->name('perusahaan.add');
    Route::get('data-perusahaan/edit', 'PerusahaanController@perusahaanEdit')->name('perusahaan.edit');


    Route::post('getkota', 'PerusahaanController@getKota')->name('perusahaan.kota');
    Route::post('getkecamatan', 'PerusahaanController@getKecamatan')->name('perusahaan.kecamatan');
    Route::post('getkelurahan', 'PerusahaanController@getKelurahan')->name('perusahaan.kelurahan');

    Route::post('store', 'PerusahaanController@store')->name('perusahaan.store');
    Route::post('update', 'PerusahaanController@update')->name('perusahaan.update');

    Route::get('lowongan', 'PerusahaanController@lowongan')->name('perusahaan.lowongan');
    Route::get('lowongan/create', 'PerusahaanController@lowonganCreate')->name('perusahaan.lowongan.create');
    Route::get('lowongan/{id}/edit', 'PerusahaanController@lowonganEdit')->name('perusahaan.lowongan.edit');
    Route::get('lowongan/{id}/view', 'PerusahaanController@lowonganShow')->name('perusahaan.lowongan.show');

    Route::post('lowongan/store', 'PerusahaanController@lowonganStore')->name('perusahaan.lowongan.store');
    Route::post('lowongan/update', 'PerusahaanController@lowonganUpdate')->name('perusahaan.lowongan.update');

    Route::delete('lowongan/{id}/delete', 'PerusahaanController@lowonganDelete')->name('perusahaan.lowongan.delete');

    Route::delete('lowongan/lamaran/{id}/delete', 'PerusahaanController@lamaranDelete')->name('perusahaan.lamaran.delete');

    Route::get('lowongan/{id}/accepted', 'PerusahaanController@lamaranAccepted')->name('perusahaan.lamaran.accepted');
    Route::get('lowongan/{id}/decline', 'PerusahaanController@lamaranDecline')->name('perusahaan.lamaran.decline');

});

Route::group(['prefix' => 'admin'], function() {
    Route::get('', 'AdminController@index')->name('admin.index');
    Route::get('user', 'AdminController@user')->name('admin.user');
    Route::get('kategori-pekerjaan', 'AdminController@kategoriPekerjaan')->name('admin.kategoriPekerjaan');
    Route::get('penyedia-kerja', 'AdminController@penyediaKerja')->name('admin.penyediaKerja');
    Route::get('pencari-kerja', 'AdminController@pencariKerja')->name('admin.pencariKerja');
    Route::get('lowongan', 'AdminController@lowongan')->name('admin.lowongan');
    Route::get('about-us', 'AdminController@aboutUs')->name('admin.aboutUs');
    Route::post('about-us-store', 'AdminController@aboutUsStore')->name('admin.aboutUsStore');
    Route::get('kontak', 'AdminController@kontak')->name('admin.kontak');
    Route::get('push-notifikasi', 'AdminController@pushNotifikasi')->name('admin.pushNotifikasi');
    Route::get('profile', 'AdminController@profile')->name('admin.profile');
    Route::get('profile-edit', 'AdminController@profileEdit')->name('admin.profile-edit');
    Route::post('profile-update', 'AdminController@profileUpdate')->name('admin.profile-update');
    Route::post('pass-update', 'AdminController@updatePassword')->name('admin.profile-pass');

    Route::group(['prefix' => 'user'], function() {
        Route::get('create', 'UserController@create')->name('user.create');
        Route::get('{id}/show', 'UserController@show')->name('user.show');
        Route::get('{id}/edit', 'UserController@edit')->name('user.edit');
        Route::get('{id}/accepted', 'UserController@accepted')->name('user.accepted');
        Route::get('{id}/decline', 'UserController@decline')->name('user.decline');


        Route::post('store', 'UserController@store')->name('user.store');
        Route::post('update', 'UserController@update')->name('user.update');

        Route::delete('{id}/delete', 'UserController@delete')->name('user.delete');
    });

    Route::group(['prefix' => 'kategoriPekerjaan'], function() {
        Route::get('create', 'KategoriPekerjaanController@create')->name('kategoriPekerjaan.create');
        Route::get('{id}/show', 'KategoriPekerjaanController@show')->name('kategoriPekerjaan.show');
        Route::get('{id}/edit', 'KategoriPekerjaanController@edit')->name('kategoriPekerjaan.edit');

        Route::post('store', 'KategoriPekerjaanController@store')->name('kategoriPekerjaan.store');
        Route::post('update', 'KategoriPekerjaanController@update')->name('kategoriPekerjaan.update');
        Route::delete('{id}/delete', 'KategoriPekerjaanController@delete')->name('kategoriPekerjaan.delete');
    });


    Route::group(['prefix' => 'penyediaKerja'], function() {
        Route::get('create', 'PenyediaKerjaController@create')->name('penyediaKerja.create');
        Route::get('{id}/show', 'PenyediaKerjaController@show')->name('penyediaKerja.show');
        Route::get('{id}/edit', 'PenyediaKerjaController@edit')->name('penyediaKerja.edit');
        Route::get('{id}/accepted', 'PenyediaKerjaController@accepted')->name('penyediaKerja.accepted');
        Route::get('{id}/decline', 'PenyediaKerjaController@decline')->name('penyediaKerja.decline');


        Route::post('getkota', 'PenyediaKerjaController@getKota')->name('penyediaKerja.kota');
        Route::post('getkecamatan', 'PenyediaKerjaController@getKecamatan')->name('penyediaKerja.kecamatan');
        Route::post('getkelurahan', 'PenyediaKerjaController@getKelurahan')->name('penyediaKerja.kelurahan');

        Route::post('store', 'PenyediaKerjaController@store')->name('penyediaKerja.store');
        Route::post('update', 'PenyediaKerjaController@update')->name('penyediaKerja.update');

        Route::delete('{id}/delete', 'PenyediaKerjaController@delete')->name('penyediaKerja.delete');
    });


    Route::group(['prefix' => 'lowongan'], function() {
        Route::get('create', 'LowonganController@create')->name('lowongan.create');
        Route::get('{id}/show', 'LowonganController@show')->name('lowongan.show');
        Route::get('{id}/edit', 'LowonganController@edit')->name('lowongan.edit');

        Route::post('store', 'LowonganController@store')->name('lowongan.store');
        Route::post('update', 'LowonganController@update')->name('lowongan.update');

        Route::delete('{id}/delete', 'LowonganController@delete')->name('lowongan.delete');
    });


    Route::group(['prefix' => 'pencariKerja'], function() {
        Route::get('create', 'PencariKerjaController@create')->name('pencariKerja.create');
        Route::get('{id}/show', 'PencariKerjaController@show')->name('pencariKerja.show');
        Route::get('{id}/edit', 'PencariKerjaController@edit')->name('pencariKerja.edit');
        Route::get('{id}/accepted', 'PencariKerjaController@accepted')->name('pencariKerja.accepted');
        Route::get('{id}/decline', 'PencariKerjaController@decline')->name('pencariKerja.decline');

        Route::post('getkota', 'PencariKerjaController@getKota')->name('pencariKerja.kota');
        Route::post('getkecamatan', 'PencariKerjaController@getKecamatan')->name('pencariKerja.kecamatan');
        Route::post('getkelurahan', 'PencariKerjaController@getKelurahan')->name('pencariKerja.kelurahan');

        Route::post('store', 'PencariKerjaController@store')->name('pencariKerja.store');
        Route::post('update', 'PencariKerjaController@update')->name('pencariKerja.update');

        Route::delete('{id}/delete', 'PencariKerjaController@delete')->name('pencariKerja.delete');
    });
});


