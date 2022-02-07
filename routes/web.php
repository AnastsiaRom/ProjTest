<?php


use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FilmController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::prefix('portal')->group(function() {
  Route::get('/portal', function () { return view('portal/portal'); });
  Route::get('/film', function () { return view('portal/film'); });
});

//только для auth user - admin, moder
Route::name('user/')->group(function () {
  Route::prefix('auth')->group(function() {
    Route::post('/signI n', [LoginController::class, 'signIn']);
    Route::post('/signUp', [RegisterController::class, 'save']);
    Route::post('/signIn', [LoginController::class, 'signIn']);
    Route::get('signIn', function () {
      if (Auth::check()) {
        return redirect(route('user/home'));
      }
      return view('signIn');
    })->name('signIn');
    Route::get('logout', function () {
      Auth::logout();
      return redirect('portal/portal');
    })->name('logout');
    Route::get('/signUp', function () {
      if(Auth::check()){
        return redirect(route('user/home'));
      }
      return view('/signUp');
    })->name('signUp');
    Route::get('home', ['middleware' => 'isAdmin', function () { return view('admin/home'); }])->name('home');
  });

  Route::prefix('film')->group(function() {
    Route::get('/filmCreate', function () { return view('film/filmCreate'); })->name('filmCreate');
    Route::get('/filmCreate', [FilmController::class, 'create']);
    Route::post('/show', function ($request) { return Request::all(); })->name('show');
    Route::redirect('/filmCreate', 'user');
    Route::resource('genre', 'GenreController');
    Route::resource('film', 'FilmController');
    // Route::post('/', [FilmController::class, 'store']);
    // Route::put('/',  [FilmController::class, 'update']);
    // Route::delete('/', [FilmController::class, 'delete']);
  });

  Route::prefix('home')->group(function() {
    Route::view('/home', 'moder/home')->middleware('auth')->name('home');
    Route::view('/home', 'admin/home')->middleware('auth')->name('home');
  });

  Route::prefix('status')->group(function() {
    Route::get('change', ['middleware' => 'isAdmin', function () {
      return view('admin/change');
    }])->name('status');
  });

});
