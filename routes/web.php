<?php

use App\Http\Controllers\DashboardAlumniController;
use App\Http\Controllers\DashboardCategory;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardIndexController;
use App\Http\Controllers\DashboardLoker;
use App\Http\Controllers\DashboardPertanyaanController;
use App\Http\Controllers\DashboardPerusahaanController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\Formanswermhs;
use App\Http\Controllers\InfoLokerController;
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
Route::get('/kontak', [TracerAlumniController::class, 'contact']);

// halaman info loker
Route::get('/loker', [InfoLokerController::class, 'index']);
Route::get('lokers/{loker:slug}', [InfoLokerController::class, 'show']);


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
// Route::get('/dashboard', function () {
//   return view('dashboard.index');
// })->middleware('auth');

Route::get('/dashboard', [DashboardIndexController::class, 'index'])->middleware('auth');


// route yang ada diddalam dashboard'

Route::resource('/dashboard/categories', DashboardCategory::class)
  ->middleware('auth');

Route::resource('/dashboard/loker', DashboardLoker::class)->middleware('auth');

// dashboard crud post
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');


Route::get('/dashboard/alumni', [DashboardAlumniController::class, 'index'])->middleware('auth');
Route::get('/dashboard/alumni/{npm}', [DashboardAlumniController::class, 'show'])->middleware('auth');

// Route::get('/dashboard/perushaan', [DashboardPerusahaanController::class, 'index'])->middleware('auth');


Route::resource('/dashboard/pertanyaan', DashboardPertanyaanController::class)->middleware('auth');
Route::patch('/dashboard/pertanyaan/{id}/toggle', [DashboardPertanyaanController::class, 'toggleActive'])->name('pertanyaan.toggleActive');
Route::get('/dashboard/pertanyaan/show-responden/{id}', [DashboardPertanyaanController::class, 'showResponden'])->middleware('auth');
Route::get('/dashboard/pertanyaan/showDetailResponden/{npm}', [DashboardPertanyaanController::class, 'showDetailResponden'])->middleware('auth');






// route untuk register
// guest hanya untuk yang belum login atau tamu
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');



Route::get('/form', [Formanswermhs::class, 'index']);
Route::post('/form', [Formanswermhs::class, 'store'])->name('form.store');
Route::get('/pertanyaan', [PertanyaanController::class, 'index']);
Route::post('/pertanyaan/{id}', [PertanyaanController::class, 'submit'])->name('pertanyaan.submit');
// Route::post('/pertanyaan', [PertanyaanController::class, 'store'])->name('pertanyaan.store');
