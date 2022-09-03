<?php

use App\Http\Controllers\Panel\DistrictController;
use App\Http\Controllers\Panel\MunicipalityController;
use App\Http\Controllers\Panel\ProfileController;
use App\Http\Controllers\Panel\RegionController;
use App\Http\Controllers\Panel\UserController;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([
    'prefix' => 'panel',
    'as' => 'panel.',
    'middleware' => ['auth']
], function() {
    //Profile
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');

    //Municipalities
    Route::resource('municipalities', MunicipalityController::class)->except('show');
    Route::get('municipalities/data', [MunicipalityController::class, 'data'])->name('municipalities.data');

    //Districts
    Route::resource('districts', DistrictController::class)->except('show');
    Route::get('districts/data', [DistrictController::class, 'data'])->name('districts.data');

    //Regions
    Route::resource('regions', RegionController::class)->except('show');
    Route::get('regions/data', [RegionController::class, 'data'])->name('regions.data');

    //Users
    Route::resource('users', UserController::class)->except('show');
    Route::get('users/data', [UserController::class, 'data'])->name('users.data');
    Route::put('users/restore/{user}', [UserController::class, 'restore'])->name('users.restore');
    Route::delete('users/force-delete/{user}', [UserController::class, 'forceDelete'])->name('users.force-delete');

});
