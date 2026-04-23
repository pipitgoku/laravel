<?php

// use App\Http\Controllers\SendEmail; //--Direct
use App\Jobs\SendEmail; //--Queue

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

Auth::routes(['register' => false]);

Route::get('/', 'HomeController@index')->name('home');

/*--Sistem--*/
Route::group(['prefix' => 'sistem','middleware' => ['check.role.menu:SYS']], function () {
    Route::get('/', function () {
        return redirect('sistem/user');
    });

    //--Autorisasi
    Route::group(['prefix' => 'autorisasi','middleware' => ['check.role.menu:SYS02']], function () {
        Route::get('/', 'RoleController@index');
        Route::post('/', 'RoleController@store');
        Route::post('/data', 'RoleController@getData');
        Route::get('/{id}', 'RoleController@show');
        Route::put('/{id}', 'RoleController@update');
        Route::delete('/{id}', 'RoleController@destroy');
        Route::get('/detail/{id}', 'RoleController@detail');
        Route::post('/role-menu', 'RoleController@saveRoleMenu');
    });

    //--User
    Route::group(['prefix' => 'user','middleware' => ['check.role.menu:SYS01']], function () {
        Route::get('/', 'UserController@index');
        Route::post('/', 'UserController@store');
        Route::post('/data', 'UserController@getData');
        Route::get('/{id}', 'UserController@show');
        Route::put('/{id}', 'UserController@update');
        Route::delete('/{id}', 'UserController@destroy');
        Route::post('/password', 'UserController@changePassword');

        Route::group(['prefix' => 'profil','middleware' => ['check.role.menu:SYS01']], function () {
			Route::get('/{id}', 'UserController@profil');
            Route::put('/image/{id}', 'UserController@changeImage');
        });
    });

    //--Kode
    Route::group(['prefix' => 'kode','middleware' => ['check.role.menu:SYS03']], function () {
        Route::get('/', 'CodeController@index');
		Route::post('/data', 'CodeController@getData');
        Route::post('/', 'CodeController@store');
        Route::get('/{id}', 'CodeController@show');
        Route::put('/{id}', 'CodeController@update');
		Route::delete('/{id}', 'CodeController@destroy');
    });
	
	//--Golongan
    Route::group(['prefix' => 'golongan','middleware' => ['check.role.menu:SYS10']], function () {
        Route::get('/', 'GolonganController@index');
		Route::post('/data', 'GolonganController@getData');
        Route::post('/', 'GolonganController@store');
        Route::get('/{id}', 'GolonganController@show');
        Route::put('/{id}', 'GolonganController@update');
		Route::delete('/{id}', 'GolonganController@destroy');
    });
	
	//--Jabatan
    Route::group(['prefix' => 'jabatan','middleware' => ['check.role.menu:SYS11']], function () {
        Route::get('/', 'JabatanController@index');
		Route::post('/data', 'JabatanController@getData');
        Route::post('/', 'JabatanController@store');
        Route::get('/{id}', 'JabatanController@show');
        Route::put('/{id}', 'JabatanController@update');
		Route::delete('/{id}', 'JabatanController@destroy');
    });
	
	//--Test
    Route::group(['prefix' => 'test','middleware' => ['check.role.menu:SYS04']], function () {
        Route::get('/', 'TestController@index');
		Route::post('/data', 'TestController@getData');
        Route::post('/', 'TestController@store');
        Route::get('/{id}', 'TestController@show');
        Route::put('/{id}', 'TestController@update');
		Route::delete('/{id}', 'TestController@destroy');
    });
});

/*--Profile--*/
Route::group(['prefix' => 'profile'], function () {
    Route::get('/', 'ProfileController@index');
    Route::get('/{id}', 'ProfileController@show');
    Route::put('/', 'ProfileController@update');
    Route::put('/image', 'ProfileController@changeImage');
    Route::post('/password', 'ProfileController@changePassword');
});
