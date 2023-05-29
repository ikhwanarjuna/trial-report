<?php

use App\Http\Controllers\DataView;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppsController;
use App\Http\Controllers\CardsController;
use App\Http\Controllers\FormsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\TrialController;
use App\Http\Controllers\ChartsController;
use App\Http\Controllers\DataViewController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExtensionController;
use App\Http\Controllers\ComponentsController;
use App\Http\Controllers\PageLayoutController;
use App\Http\Controllers\MiscellaneousController;
use App\Http\Controllers\TrialMaterialController;
use App\Http\Controllers\UserInterfaceController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CompositionController;
use App\Http\Controllers\ProcessController;
use App\Http\Controllers\TrialMachineController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserListController;
use App\Models\Composition;

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

// Main Page Route

Route::get('/',[LoginController::class, 'index'])->name('login');
Route::post('/', [LoginController::class, 'authenticate']);

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::resource('app', TrialController::class)->middleware(('auth'));
Route::get('data/{id}', [TrialMaterialController::class, 'index'])->middleware(('auth'))->name('material.index');
Route::post('data/{id}', [TrialMaterialController::class, 'store'])->middleware(('auth'))->name('material.store');
Route::delete('data/{id?}',[TrialMaterialController::class, 'destroy'])->name('material.destroy')->middleware(('auth'));
Route::get('data/{id}/edit',[TrialMaterialController::class, 'edit'])->name('material.edit')->middleware(('auth'));
Route::put('data/update/{id}',[TrialMaterialController::class, 'update'])->name('material.update')->middleware(('auth'));
Route::resource('user', UserListController::class)->middleware(('auth'));
Route::get('data/composition/{id}', [CompositionController::class, 'index'])->name('composition.index')->middleware(('auth'));
Route::post('data/composition/{id}', [CompositionController::class, 'store'])->name('composition.store')->middleware(('auth'));
Route::delete('composition/{id?}', [CompositionController::class, 'destroy'])->name('composition.destroy')->middleware(('auth'));
Route::get('data/composition/{id}/edit',[CompositionController::class, 'edit'])->name('composition.edit')->middleware(('auth'));
Route::put('data/composition/update/{id}',[CompositionController::class, 'update'])->name('composition.update')->middleware(('auth'));
Route::resource('proses', ProcessController::class)->middleware(('auth'));
Route::get('data/machine/{id}', [TrialMachineController::class, 'index'])->name('machine.index')->middleware(('auth'));
Route::post('data/machine/{id}', [TrialMachineController::class, 'store'])->name('machine.store')->middleware(('auth'));
Route::delete('machine/{id?}', [TrialMachineController::class, 'destroy'])->name('machine.destroy')->middleware(('auth'));

/* Route Dashboards */
/* Route Dashboards */

/* Route Apps */
// Route::group(['prefix' => '/app'], function () {   
//     Route::get('user/view/security', [AppsController::class, 'user_view_security'])->name('app-user-view-security')->middleware(('auth'));
//     Route::get('user/view/billing', [AppsController::class, 'user_view_billing'])->name('app-user-view-billing')->middleware(('auth'));
//     Route::get('user/view/notifications', [AppsController::class, 'user_view_notifications'])->name('app-user-view-notifications')->middleware(('auth'));
//     Route::get('user/view/connections', [AppsController::class, 'user_view_connections'])->name('app-user-view-connections')->middleware(('auth'));
// });