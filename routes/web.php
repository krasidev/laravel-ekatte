<?php

use App\Http\Controllers\Panel\DistrictController;
use App\Http\Controllers\Panel\MunicipalityController;
use App\Http\Controllers\Panel\ProfileController;
use App\Http\Controllers\Panel\RegionController;
use App\Http\Controllers\Panel\SettlementController;
use App\Http\Controllers\Panel\TownHallController;
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

Route::group([
    'prefix' => 'panel',
    'as' => 'panel.',
    'middleware' => ['auth']
], function() {
    //Profile
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');

    //Settlements
    Route::resource('settlements', SettlementController::class)->except('show');
    Route::get('settlements/data', [SettlementController::class, 'data'])->name('settlements.data');
    Route::get('settlements/data-municipalities', [SettlementController::class, 'dataMunicipalities'])->name('settlements.data-municipalities');
    Route::get('settlements/data-town-halls', [SettlementController::class, 'dataTownHalls'])->name('settlements.data-town-halls');

    //Town-halls
    Route::resource('town-halls', TownHallController::class)->except('show');
    Route::get('town-halls/data', [TownHallController::class, 'data'])->name('town-halls.data');

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
