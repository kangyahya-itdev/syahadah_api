<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\AuthController;
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
    return view('welcome');
});
Route::get('/flutter', function(){
    return view('flutter.index');
});

Route::post('/login', [AuthController::class, 'loginAction']);
Route::get('/login', [FrontController::class, 'login'])->name('login');
Route::get('/register', [FrontController::class, 'register'])->name('register');
Route::get('/front', [FrontController::class, 'index']);
