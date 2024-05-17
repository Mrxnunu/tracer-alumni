<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TracerAlumniController;
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

// Route::get('/', function () {
//     return view('welcome');
// });




Route::get('/', [TracerAlumniController::class, 'show']);

// halaman all artikel
Route::get('/artikel', [PostController::class, 'index']);

// halaman single artikel
Route::get('posts/{post:slug}', [PostController::class, 'show']);


// route untuk login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
// Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


// route berhasil login dan mengarah ke dashboard
Route::get('/dashboard', function () {
  return view('dashboard.index');
})->middleware('auth');


// route untuk register
// guest hanya untuk yang belum login atau tamu
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');




Route::get('/pertanyaan', [PertanyaanController::class, 'index']);
