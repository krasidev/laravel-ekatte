<?php

use App\Http\Controllers\Panel\DistrictController;
use App\Http\Controllers\Panel\MunicipalityController;
use App\Http\Controllers\Panel\PermissionController;
use App\Http\Controllers\Panel\ProfileController;
use App\Http\Controllers\Panel\RegionController;
use App\Http\Controllers\Panel\RoleController;
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
    Route::resource('settlements', SettlementController::class)->only('index');
    Route::resource('settlements', SettlementController::class)->only(['create', 'store'])->middleware('role_or_permission:admin|panel.settlements.create');
    Route::resource('settlements', SettlementController::class)->only(['edit', 'update'])->middleware('role_or_permission:admin|panel.settlements.edit');
    Route::resource('settlements', SettlementController::class)->only('destroy')->middleware('role_or_permission:admin|panel.settlements.destroy');
    Route::get('settlements/data', [SettlementController::class, 'data'])->name('settlements.data');
    Route::get('settlements/data-municipalities', [SettlementController::class, 'dataMunicipalities'])->name('settlements.data-municipalities');
    Route::get('settlements/data-town-halls', [SettlementController::class, 'dataTownHalls'])->name('settlements.data-town-halls');
    Route::get('settlements/export', [SettlementController::class, 'export'])->name('settlements.export');

    //Town-halls
    Route::resource('town-halls', TownHallController::class)->only('index')->middleware('role_or_permission:admin|panel.town-halls.index');
    Route::resource('town-halls', TownHallController::class)->only(['create', 'store'])->middleware('role_or_permission:admin|panel.town-halls.create');
    Route::resource('town-halls', TownHallController::class)->only(['edit', 'update'])->middleware('role_or_permission:admin|panel.town-halls.edit');
    Route::resource('town-halls', TownHallController::class)->only('destroy')->middleware('role_or_permission:admin|panel.town-halls.destroy');
    Route::get('town-halls/data', [TownHallController::class, 'data'])->name('town-halls.data')->middleware('role_or_permission:admin|panel.town-halls.index');
    Route::get('town-halls/export', [TownHallController::class, 'export'])->name('town-halls.export')->middleware('role_or_permission:admin|panel.town-halls.index');

    //Municipalities
    Route::resource('municipalities', MunicipalityController::class)->only('index')->middleware('role_or_permission:admin|panel.municipalities.index');
    Route::resource('municipalities', MunicipalityController::class)->only(['create', 'store'])->middleware('role_or_permission:admin|panel.municipalities.create');
    Route::resource('municipalities', MunicipalityController::class)->only(['edit', 'update'])->middleware('role_or_permission:admin|panel.municipalities.edit');
    Route::resource('municipalities', MunicipalityController::class)->only('destroy')->middleware('role_or_permission:admin|panel.municipalities.destroy');
    Route::get('municipalities/data', [MunicipalityController::class, 'data'])->name('municipalities.data')->middleware('role_or_permission:admin|panel.municipalities.index');
    Route::get('municipalities/export', [MunicipalityController::class, 'export'])->name('municipalities.export')->middleware('role_or_permission:admin|panel.municipalities.index');

    //Districts
    Route::resource('districts', DistrictController::class)->only('index')->middleware('role_or_permission:admin|panel.districts.index');
    Route::resource('districts', DistrictController::class)->only(['create', 'store'])->middleware('role_or_permission:admin|panel.districts.create');
    Route::resource('districts', DistrictController::class)->only(['edit', 'update'])->middleware('role_or_permission:admin|panel.districts.edit');
    Route::resource('districts', DistrictController::class)->only('destroy')->middleware('role_or_permission:admin|panel.districts.destroy');
    Route::get('districts/data', [DistrictController::class, 'data'])->name('districts.data')->middleware('role_or_permission:admin|panel.districts.index');
    Route::get('districts/export', [DistrictController::class, 'export'])->name('districts.export')->middleware('role_or_permission:admin|panel.districts.index');

    //Regions
    Route::resource('regions', RegionController::class)->only('index')->middleware('role_or_permission:admin|panel.regions.index');
    Route::resource('regions', RegionController::class)->only(['create', 'store'])->middleware('role_or_permission:admin|panel.regions.create');
    Route::resource('regions', RegionController::class)->only(['edit', 'update'])->middleware('role_or_permission:admin|panel.regions.edit');
    Route::resource('regions', RegionController::class)->only('destroy')->middleware('role_or_permission:admin|panel.regions.destroy');
    Route::get('regions/data', [RegionController::class, 'data'])->name('regions.data')->middleware('role_or_permission:admin|panel.regions.index');
    Route::get('regions/export', [RegionController::class, 'export'])->name('regions.export')->middleware('role_or_permission:admin|panel.regions.index');

    //Users
    Route::resource('users', UserController::class)->only('index')->middleware('role_or_permission:admin|panel.users.index');
    Route::resource('users', UserController::class)->only(['create', 'store'])->middleware('role_or_permission:admin|panel.users.create');
    Route::resource('users', UserController::class)->only(['edit', 'update'])->middleware('role_or_permission:admin|panel.users.edit');
    Route::resource('users', UserController::class)->only('destroy')->middleware('role_or_permission:admin|panel.users.destroy');
    Route::get('users/data', [UserController::class, 'data'])->name('users.data')->middleware('role_or_permission:admin|panel.users.index');
    Route::put('users/restore/{user}', [UserController::class, 'restore'])->name('users.restore')->middleware('role_or_permission:admin|panel.users.restore');
    Route::delete('users/force-delete/{user}', [UserController::class, 'forceDelete'])->name('users.force-delete')->middleware('role_or_permission:admin|panel.users.force-delete');

    //Roles
    Route::resource('roles', RoleController::class)->only('index')->middleware('role_or_permission:admin|panel.roles.index');
    Route::resource('roles', RoleController::class)->only(['create', 'store'])->middleware('role_or_permission:admin|panel.roles.create');
    Route::resource('roles', RoleController::class)->only(['edit', 'update'])->middleware('role_or_permission:admin|panel.roles.edit');
    Route::resource('roles', RoleController::class)->only('destroy')->middleware('role_or_permission:admin|panel.roles.destroy');
    Route::get('roles/data', [RoleController::class, 'data'])->name('roles.data')->middleware('role_or_permission:admin|panel.roles.index');

    //Permissions
    Route::resource('permissions', PermissionController::class)->only('index')->middleware('role_or_permission:admin|panel.permissions.index');
    Route::resource('permissions', PermissionController::class)->only(['edit', 'update'])->middleware('role_or_permission:admin|panel.permissions.edit');
    Route::get('permissions/data', [PermissionController::class, 'data'])->name('permissions.data')->middleware('role_or_permission:admin|panel.permissions.index');
});
