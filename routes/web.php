<?php

use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RentController;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Car;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->prefix('profile')->name('profile.')->controller(ProfileController::class)->group(function () {
    Route::get('/', 'edit')->name('edit');
    Route::patch('/', 'update')->name('update');
    Route::delete('/', 'destroy')->name('destroy');
});

Route::get('/catalogue', 'App\Http\Controllers\RentController@catalogue')->name('cars');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('/check-availability', 'rent.form')->name('check-availability');

    Route::controller(RentController::class)->name('rent.')->group(function () {
        Route::post('/check-availability', 'checkAvailability')->name('check-availability');
        Route::post('/make_rent', 'validationForm')->name('validation-form');
        Route::post('/confirm_rent', 'doRent')->name('doRent');
    });
});

Route::get('/car/show', function (Request $request): View {
    return view('car.show', ['car' => Car::findOrFail((int)$request->input('id'))]);
})->name('car.show');

Route::get('/catalogue/search-car', [CarController::class, 'searchCar'])->name('search-car');
Route::get('/catalogue/search-carjs', [CarController::class, 'searchCarjs'])->name('search-carjs');
//--------------------------------------------------------------------------------------------//

// Partie Admin

Route::middleware(['auth', 'verified'])->group(function () {

    Route::prefix('/car')->name('car.')->controller(CarController::class)->group(function () {
        Route::get('/new', 'create')->name('create');
        Route::post('/new', 'store')->name('store');

        Route::get('/update', 'updateForm')->name('update');
        Route::post('/update', 'update');

        Route::get('/delete', 'deleteForm')->name('delete');
        Route::post('/delete', 'delete');
    });

    Route::get('/customers', function () {
        return view('customers', ['customers' => User::has('rents')->get()]);
    })->name('customers');
});

require __DIR__ . '/auth.php';
