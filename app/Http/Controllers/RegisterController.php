<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function save(Request $request){
        if(Auth::check()){
            return redirect()->to(route('user.moderHome'));
        }

        $validateFields = $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if (User::where('email', $validateFields['email'])->exists()){
            return redirect(route('user.signIn'))->withErrors([
                'email'=>'Пользователь существует'
            ]);
        }

        $user = User::create($validateFields);
        if($user){
            Auth::login($user);
            return redirect()->to(route('user.moderHome'));
        }

        return redirect(route('user.signUp'))->withErrors([
            'formError'=>'Произошла ошибка при сохранении пользователя'
        ]);
    }
}
