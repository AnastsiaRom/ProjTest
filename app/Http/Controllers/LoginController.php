<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function signIn(Request $request){
        if (Auth::check()){
            return redirect()->intended(route('user.moderHome'));
        }


        $formFields = $request->only(['email', 'password', 'is_admin' == '0']);

        if(Auth::attempt($formFields)){
            return redirect()->intended(route('user.moderHome'));
        }

        return redirect(route('user.signIn'))->withErrors([
            'email'=>'Не удалось авторизоваться'
        ]);
    }
}
