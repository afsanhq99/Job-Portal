<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SslCommerzPaymentController;

use App\Http\Controllers\AdminControllers\DashboardController;
use App\Http\Controllers\AdminControllers\CategoryController;
use App\Http\Controllers\AdminControllers\SettingController;
use App\Http\Controllers\AdminControllers\JobpostController;
use App\Http\Controllers\AdminControllers\SliderController;
use App\Http\Controllers\ClientControllers\ClientController;
use App\Http\Controllers\ClientControllers\JobController;
use App\Http\Controllers\ClientControllers\CartController;
use App\Http\Controllers\ClientControllers\PageController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

require __DIR__.'/auth.php';


//admin controller start...
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware('auth') ;
Route::get('/logout', [DashboardController::class, 'logout'])->middleware('auth') ;

//category
Route::get('/category', [CategoryController::class, 'create'])->middleware('auth') ;
Route::post('/store-category', [CategoryController::class, 'store'])->middleware('auth') ;
Route::get('/all-category', [CategoryController::class, 'index'])->middleware('auth') ;
Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->middleware('auth') ;
Route::post('/update-category/{id}', [CategoryController::class, 'update'])->middleware('auth') ;
Route::post('/delete-category/{id}', [CategoryController::class, 'destroy'])->middleware('auth') ;

//slider
Route::resource('slider',SliderController::class)->middleware('auth') ;

//all workers
Route::get('/workers', [DashboardController::class, 'workers'])->middleware('auth') ;
Route::get('/edit-workers/{id}', [DashboardController::class, 'editworkers'])->middleware('auth') ;
Route::post('/update-workers/{id}', [DashboardController::class, 'updateworkers'])->middleware('auth') ;
Route::delete('/delete-workers/{id}', [DashboardController::class, 'destroyworkers'])->middleware('auth') ;
//all users
Route::get('/users', [DashboardController::class, 'users'])->middleware('auth') ;
Route::get('/edit-users/{id}', [DashboardController::class, 'editusers'])->middleware('auth') ;
Route::post('/update-users/{id}', [DashboardController::class, 'updateusers'])->middleware('auth') ;
Route::delete('/delete-users/{id}', [DashboardController::class, 'destroyusers'])->middleware('auth') ;


//jobpost
Route::resource('jobpost',JobpostController::class)->middleware('auth') ;
Route::get('/subscribers', [DashboardController::class, 'subscribers'])->middleware('auth');
Route::post('/delete-subscribers/{id}', [DashboardController::class, 'destroysubscribers'])->middleware('auth');

//orders
Route::get('/orders', [DashboardController::class, 'orders'])->middleware('auth') ;
Route::get('/order-synced/{id}', [DashboardController::class, 'sync']);
Route::get('/order-update/{id}', [DashboardController::class, 'update']);
Route::get('/order-remove/{id}', [DashboardController::class, 'cancel']);
//page create
Route::get('/create-page', [\App\Http\Controllers\AdminControllers\PageController::class, 'create'])->middleware('auth');
Route::post('/store-page', [\App\Http\Controllers\AdminControllers\PageController::class, 'store'])->middleware('auth');
Route::get('/all-page', [\App\Http\Controllers\AdminControllers\PageController::class, 'index'])->name('admin.page')->middleware('auth');
Route::get('/edit-page/{id}', [\App\Http\Controllers\AdminControllers\PageController::class, 'edit'])->middleware('auth');
Route::post('/update-page/{id}', [\App\Http\Controllers\AdminControllers\PageController::class, 'update'])->middleware('auth');
Route::delete('/delete-page/{id}', [\App\Http\Controllers\AdminControllers\PageController::class, 'destroy'])->middleware('auth');
//Route::get('/admin/all-post', [JobpostController::class, 'index']);