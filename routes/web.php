<?php

use App\Models\User;
use App\Models\Materi;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ChalenggeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardMateriController;
use App\Http\Controllers\DashboardChalenggeController;

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

Route::get('/', function () {
    return view('home',[
        'materis' => Materi::with('category')->latest()->limit(6)->get()
    ]);
});

Route::get('/category', [CategoryController::class, 'index']);

Route::get('/materi', [MateriController::class, 'index']);

Route::get('materi/{materi:slug}', [MateriController::class, 'show']);

Route::get('/chalengge', [ChalenggeController::class, 'index'])->middleware('auth');

Route::get('chalengge/{chalengge:slug}', [ChalenggeController::class, 'show'])->middleware('auth');

Route::post('chalengge/{chalengge:slug}', [ChalenggeController::class, 'checkAnswer'])->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');

Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::resource('/dashboard/materi', DashboardMateriController::class)->middleware('admin');

Route::get('/dashboard/materi/checkSlug', [DashboardMateriController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/chalengge', DashboardChalenggeController::class)->middleware('admin');

Route::get('/scoreboard', function () {
    return view('scoreboard.index', [
        "title" => "Scoreboards",
        "users" => User::orderBy('nilai', 'desc')->get()
    ]);
});