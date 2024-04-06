<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\UserDashboard;
use App\Http\Middleware\commonMiddleware;
use App\Http\Controllers\AdminController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::post('form_register_submit', [SampleController::class, 'register_submit']);
Route::get('view_registration_data', [SampleController::class, 'fetch_registration_data']);
Route::get('edit_user/{em}', [SampleController::class, 'edit_user']);

Route::get('verifyAccount/{email}', [SampleController::class, 'Activate_account']);
Route::post('login_action', [SampleController::class, 'login_action']);
Route::get('logout', [UserDashboard::class, 'logout']);
Route::get('login', [SampleController::class, 'login_page']);
Route::get('register', [SampleController::class, 'register_page']);
// Route::group(['middleware' => ['testing']], function () {
Route::get('/', [SampleController::class, 'index_page']);
Route::get('home', [SampleController::class, 'index_page']);
Route::get('about', [SampleController::class, 'about_page']);
Route::get('contact', [SampleController::class, 'contact_page']);
// });

//User Dashnoard Routes
Route::get('user_dashboard', [UserDashboard::class, 'user_dashboard'])->middleware('testing::class');
Route::get('add_task', [UserDashboard::class, 'add_task'])->middleware('testing::class');
Route::get('edit_profile', [UserDashboard::class, 'edit_profile'])->middleware('testing::class');


// Admin Dashboard Routes
Route::get('admin_dashboard', [AdminController::class, 'admin_dashboard'])->middleware('admin_auth::class');
Route::get('admin_edit_profile', [AdminController::class, 'admin_edit_profile'])->middleware('admin_auth::class');
