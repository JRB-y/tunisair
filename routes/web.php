<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\EmployeController;
use App\Http\Controllers\Frontend\FlightController;
use App\Http\Controllers\Frontend\SearchController;
use App\Http\Controllers\Backend\ActualiteController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Backend\ConventionController;
use App\Http\Controllers\Frontend\TicketRequestController as TicketRequestFront;
use App\Http\Controllers\Backend\TicketRequestController as TicketRequestBack;
use App\Http\Controllers\Frontend\QuotaControlService;

// Auth routes
Auth::routes();

Route::get('/', function () {
    if (Auth::check()) {
        if (request()->user()->role === 'admin') return redirect(route('home'));
        if (request()->user()->role === 'employe') return redirect(route('frontend'));
    }

    return view('auth.login');
})->name('root');

/** Loggedin routes  */
Route::group(['middleware' => 'auth'], function () {

    /*******************************/
    /** FRONT END ROUTES           */
    /******************************/
    Route::group(['prefix' => 'site'], function () {
        Route::get('/', [FrontendController::class, 'index'])->name('frontend');
        Route::get('/actualites/{id}', [FrontendController::class, 'show'])->name('frontend.convention.show');

        // display search by convention type
        Route::get('search/{type}/{id}', [SearchController::class, 'show'])->name('frontend.display.search');

        // seach
        Route::post('search', [SearchController::class, 'search'])->name('frontend.search');

        // Daily Flights
        Route::get('daily-flights', [FlightController::class, 'daily'])->name('frontend.daily-flights');

        // Agencies
        Route::get('agencies', function () {
            return view('frontend.agencies.index');
        })->name('frontend.agencies-map');

        Route::get('/tickets', [TicketRequestFront::class, 'index'])->name('frontend.tickets.index');
        Route::get('/tickets/{flightId}', [TicketRequestFront::class, 'buy'])->name('frontend.tickets.buy');
        Route::get('/tickets/dismiss/{flightId}', [TicketRequestFront::class, 'dismiss'])->name('frontend.tickets.dismiss');

        Route::post('/tickets/search', [QuotaControlService::class, 'search'])->name('frontend.search.vols');
    });


    
    /**************************/
    /** BACKEND ROUTES        */
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

        Route::group(['prefix' => 'banner'], function () {
            Route::get('/', [BannerController::class, 'index'])->name('backend.banner.index');
            Route::get('/create', [BannerController::class, 'create'])->name('backend.banner.create');
            Route::post('/store', [BannerController::class, 'store'])->name('backend.banner.store');
            Route::get('/{id}', [BannerController::class, 'show'])->name('backend.banner.show');
            Route::get('/edit/{id}', [BannerController::class, 'edit'])->name('backend.banner.edit');
            Route::post('/update/{id}', [BannerController::class, 'update'])->name('backend.banner.update');
        });

        Route::group(['prefix' => 'ticket-requests'], function () {
            Route::get('/', [TicketRequestBack::class, 'index'])->name('backend.ticket-requests.index');
            Route::get('/{requestId}', [TicketRequestBack::class, 'show'])->name('backend.ticket-requests.show');

            Route::get('/approve/{id}', [TicketRequestBack::class, 'approve'])->name('backend.ticket-requests.approve');
            Route::get('/decline/{id}', [TicketRequestBack::class, 'decline'])->name('backend.ticket-requests.decline');
        });

    });
});
