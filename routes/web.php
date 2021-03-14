<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Backend\EmployeController;
use App\Http\Controllers\Backend\ActualiteController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ConventionController;
use App\Http\Controllers\Frontend\SearchController;

// Auth routes
Auth::routes();

Route::get('/', function () {
    if (Auth::check()) {
        if (request()->user()->role === 'admin') return redirect(route('home'));
        if (request()->user()->role === 'employe') return redirect(route('frontend'));
    }

    return view('auth.login');
});

/** Loggedin routes  */
Route::group(['middleware' => 'auth'], function () {

    /*******************************/
    /** Employee routes (frontend) */
    /******************************/
    Route::group(['prefix' => 'site'], function () {
        Route::get('/', [FrontendController::class, 'index'])->name('frontend');
        Route::get('/actualites/{id}', [FrontendController::class, 'show'])->name('frontend.convention.show');

        // display search by convention type
        Route::get('search/{type}/{id}', [SearchController::class, 'show'])->name('frontend.display.search');

        // seach
        Route::post('search', [SearchController::class, 'search'])->name('frontend.search');
    });


    
    /**************************/
    /** Admin routes (backend) */
    /**************************/
    Route::group(['prefix' => 'backend'], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('home');

        // auto generated from template
        Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\Backend\ProfileController@edit']);
        Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\Backend\ProfileController@update']);
        Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\Backend\ProfileController@password']);

        Route::group(['prefix' => 'actualites'], function () {
            Route::get('/', [ActualiteController::class, 'index'])->name('backend.actualite');
            Route::get('/create', [ActualiteController::class, 'create'])->name('backend.actualite.create');
            Route::post('/', [ActualiteController::class, 'store'])->name('backend.actualite.store');
            Route::get('/{id}', [ActualiteController::class, 'show'])->name('backend.actualite.show');
            Route::get('/edit/{id}', [ActualiteController::class, 'edit'])->name('backend.actualite.edit');
            Route::post('/edit/{id}', [ActualiteController::class, 'update'])->name('backend.actualite.update');
            Route::get('/active/{id}', [ActualiteController::class, 'active'])->name('backend.actualite.active');
        });

        Route::group(['prefix' => 'employees'], function () {
            Route::get('/', [EmployeController::class, 'index'])->name('backend.employes');
            Route::get('/create', [EmployeController::class, 'create'])->name('backend.employes.create');
            Route::post('/', [EmployeController::class, 'store'])->name('backend.employes.store');
            Route::get('/edit/{id}', [EmployeController::class, 'edit'])->name('backend.employes.edit');
            Route::post('/edit/{id}', [EmployeController::class, 'update'])->name('backend.employes.update');
            Route::get('/active/{id}', [EmployeController::class, 'active'])->name('backend.employes.active');
        });

        Route::group(['prefix' => 'conventions'], function () {
            Route::get('/', [ConventionController::class, 'index'])->name('backend.convention');
            Route::get('/create', [ConventionController::class, 'create'])->name('backend.convention.create');
            Route::post('/', [ConventionController::class, 'store'])->name('backend.convention.store');
            Route::get('/edit/{id}', [ConventionController::class, 'edit'])->name('backend.convention.edit');
            Route::post('/edit/{id}', [ConventionController::class, 'update'])->name('backend.convention.update');
        });
    });
});
