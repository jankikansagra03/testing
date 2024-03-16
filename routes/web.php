<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SampleController;
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

Route::get('/', [SampleController::class, 'index_page']);
Route::get('home', [SampleController::class, 'index_page']);
Route::get('about', [SampleController::class, 'about_page']);
Route::get('contact', [SampleController::class, 'contact_page']);
Route::get('login', [SampleController::class, 'login_page']);
Route::get('register', [SampleController::class, 'register_page']);
Route::post('form_register_submit', [SampleController::class, 'register_submit']);
