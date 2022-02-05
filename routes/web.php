<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Client\Request;

Route::get('/', function () 
{
    return view('portal');});

Route::get('/portalCarta', function () 
{
    return view('portalCarta');});


Route::name('user.')->group(function ()
{
    Route::view('/moderHome', 'moderHome')->middleware('auth')->name('moderHome');
    Route::get('/signIn', function ()
    {
        if (Auth::check()) {
            return redirect(route('user.moderHome'));
        }
        return view('signIn');
    })->name('signIn');

    Route::post('/signIn', [\App\Http\Controllers\LoginController::class, 'signIn']);

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
        return view('signUp');
    })->name('signUp');

    Route::post('/signUp', [\App\Http\Controllers\RegisterController::class, 'save']);

    Route::get('adminHome', ['middleware' => 'isAdmin', function () 
    {
        return view('adminHome');
    }]);

    Route::get('adminChange', ['middleware' => 'isAdmin', function () 
    {
        return view('adminChange');
    }]);

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
