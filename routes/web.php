<?php

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\PortalController;




// -----------------------
// | Views
// -----------------------
Route::get('/',     [PortalController::class, 'index'])->name('index');
Route::get('/home', [PortalController::class, 'home'])->name('home');



// Route::prefix('portal')->name('portal')->group(function () {

//   // Route::get('/film', function () {
//   //   return view('portal/film');
//   // });
// });

Route::prefix('auth')->name('auth.')->group(function () {
  Route::get('signin', [AuthController::class, 'signin'])->name('signin');
  Route::get('signup', [AuthController::class, 'signup'])->name('signup');

  Route::post('/register', [AuthController::class, 'register'])->name('register');
  Route::post('/login',    [AuthController::class, 'login'])->name('login');
  // Route::get('logout', [HomeController::class, 'logout']);
});

Route::prefix('film')->name('film.')->group(function () {
  Route::get('/show/{film_id}', [FilmController::class, 'show'])->name('show');
  Route::get('/create',         [FilmController::class, 'create'])->name('create');

  Route::post('/',              [FilmController::class, 'store'])->name('store');
});


//только для auth user - admin, moder
// Route::name('user')->group(function () {

//   Route::prefix('film')->group(function () {
//     Route::get('/filmCreate', function () {
//       return view('film/filmCreate');
//     })->name('filmCreate');

//     Route::get('/filmCreate', [FilmController::class, 'create']);

//     Route::post('/show', function ($request) {
//       return Request::all();
//     })->name('show');

//     Route::redirect('/filmCreate', 'user');

//     // Route::resource('genre', 'GenreController');
//     // Route::resource('film', 'FilmController');

//     // Route::post('/', [FilmController::class, 'store']);
//     // Route::put('/',  [FilmController::class, 'update']);
//     // Route::delete('/', [FilmController::class, 'delete']);
//   });

//   Route::prefix('home')->group(function () {
//     Route::view('/moder', 'moder/home')->middleware('auth')->name('moder');
//     Route::get('home', ['middleware' => 'isAdmin', function () {
//       return view('admin/home');
//     }])->name('home');
//   });

//   Route::prefix('status')->group(function () {
//     Route::get('change', ['middleware' => 'isAdmin', function () {
//       return view('admin/change');
//     }])->name('status');
//   });
// });
