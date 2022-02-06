<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Client\Request;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

use App\User;

Route::get('/', function ()
{
    return view('portal/portal');});

Route::get('/portalCarta', function ()
{
    return view('portal/portalCarta');});


Route::name('user.')->group(function ()
{
    Route::view('/moderHome', 'moder/moderHome')->middleware('auth')->name('moderHome');
    Route::get('/signIn', function ()
    {
        if (Auth::check()) {
            return redirect(route('user.moderHome'));
        }
        return view('authent/signIn');
    })->name('signIn');

    Route::post('/signIn', [LoginController::class, 'signIn']);

    Route::get('logout', function ()
    {
        Auth::logout();
        return redirect('/');
    })->name('logout');

    Route::get('/signUp', function ()
    {
        if(Auth::check()){
            return redirect(route('user.moderHome'));
        }
        return view('authent/signUp');
    })->name('signUp');

    Route::post('/signUp', [RegisterController::class, 'save']);

    Route::get('adminHome', ['middleware' => 'isAdmin', function ()
    {
        return view('admin/adminHome');
    }])->name('adminHome');

    Route::get('adminChange', ['middleware' => 'isAdmin', function ()
    {
        return view('admin/adminChange');
    }])->name('adminChange');


    // ПРИМЕР
    Route::prefix('auth')->group(function() {
        Route::post('/signI n', [LoginController::class, 'signIn']);
    });

    Route::prefix('film')->group(function() {
        // Route::post('/', [FilmController::class, 'store']);
        // Route::put('/',  [FilmController::class, 'update']);
        // Route::delete('/', [FilmController::class, 'delete']);
    });



    // Route::get('/moderCreat', function () {
    //     if (!Auth::check()){
    //         return  redirect('signIn');
    //     }
    //     return view('moderCreat');
    // })->name('moderCreat');

    // Route::post('/moderCreat/submit', function () {
    //     if (!Auth::check()){
    //         return  redirect('signIn');
    //     }
    //     return "Ogo";
    // })->name('moderSubmit');

    Route::get('/moderCreat', function () {
        return view('moderCreat');
    })->name('moderCreat');

    Route::get('/moderCreat', [\App\Http\Controllers\CartController::class, 'create']);

    Route::post('/moderCreat/show', function ($request) {
        return Request::all();
    })->name('moderCreat/show');

    // Route::get('/moderCarta', function ()
    // {
    //     if(!Auth::check()){
    //         return redirect(route('signIn'));
    //     }
    //     return view('moderCarta');
    // })->name('moderCarta');

    Route::redirect('/moderCarta', 'user');
    Route::resource('genre', 'GenreController');

    Route::resource('film', 'CartController');

});
