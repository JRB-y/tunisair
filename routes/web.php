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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/guest', [App\Http\Controllers\GuestController::class, 'index'])->name('gest.index');
Route::get('/employe', [App\Http\Controllers\EmployeController::class, 'index'])->name('employe.index');

Route::get('/', function () {
    return view('auth.login');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::get('/actualite', [App\Http\Controllers\ActualiteController::class, 'index'])->name('actualite');
Route::get('/actualite/create', [App\Http\Controllers\ActualiteController::class, 'create'])->name('actualite.create');
Route::post('/actualite', [App\Http\Controllers\ActualiteController::class, 'store'])->name('actualite.store');
Route::get('/actualite/{id}', [App\Http\Controllers\ActualiteController::class, 'show'])->name('actualite.store');
Route::get('/actualite/active/{id}', [App\Http\Controllers\ActualiteController::class, 'active'])->name('actualite.active');
Route::get('/actualite/edit/{id}', [App\Http\Controllers\ActualiteController::class, 'edit'])->name('actualite.edit');
Route::post('/actualite/edit/{id}', [App\Http\Controllers\ActualiteController::class, 'update'])->name('actualite.update');

Route::get('/employes', [App\Http\Controllers\AdminEmployeController::class, 'index'])->name('admin.employes');
Route::get('/employes/create', [App\Http\Controllers\AdminEmployeController::class, 'create'])->name('admin.employes.create');
Route::post('/employes', [App\Http\Controllers\AdminEmployeController::class, 'store'])->name('admin.employes.store');
Route::get('/employes/edit/{id}', [App\Http\Controllers\AdminEmployeController::class, 'edit'])->name('admin.employes.edit');
Route::post('/employes/edit/{id}', [App\Http\Controllers\AdminEmployeController::class, 'update'])->name('admin.employes.update');
Route::get('/employes/active/{id}', [App\Http\Controllers\AdminEmployeController::class, 'active'])->name('admin.employes.active');

Route::get('/conventions', [App\Http\Controllers\AdminConventionController::class, 'index'])->name('admin.convention');
Route::get('/conventions/create', [App\Http\Controllers\AdminConventionController::class, 'create'])->name('admin.convention.create');
Route::post('/conventions', [App\Http\Controllers\AdminConventionController::class, 'store'])->name('admin.convention.store');
Route::get('/conventions/edit/{id}', [App\Http\Controllers\AdminConventionController::class, 'edit'])->name('admin.convention.edit');
Route::post('/conventions/edit/{id}', [App\Http\Controllers\AdminConventionController::class, 'update'])->name('admin.convention.update');
