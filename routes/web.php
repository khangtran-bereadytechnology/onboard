<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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
    return view('home');
});

//route hiện view đăng nhập
Route::get('/login', [AuthController::class, 'showSigninForm'])->middleware('guest')->name('login');
//route xử lý đăng nhập
Route::post('/login', [AuthController::class, 'signIn'])->middleware('guest')->name('auth.signin');
//route xử lý đăng xuất
Route::post('/signout', [AuthController::class, 'signOut'])->middleware('auth')->name('auth.signout');
