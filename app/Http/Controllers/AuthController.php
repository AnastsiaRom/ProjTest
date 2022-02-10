<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  public function signin()
  {
    if (Auth::check()) {
      return redirect(route('home'));
    }
    return view('auth/signin');
  }

  public function signup()
  {
    if (Auth::check()) {
      return redirect(route('home'));
    }
    return view('auth/signup');
  }



  public function login(Request $request)
  {
    if (Auth::check()) {
      return redirect()->intended(route('home'));
    }

    $formFields = $request->only(['email', 'password', 'is_admin' == '0']);

    if (Auth::attempt($formFields)) {
      return redirect()->intended(route('home'));
    }

    return redirect(route('user.signin'))->withErrors([
      'email' => 'Не удалось авторизоваться'
    ]);
  }

  public function register(Request $request)
  {
    if (Auth::check()) {
      return redirect()->to(route('home'));
    }

    $validateFields = $request->validate([
      'email' => 'required|email',
      'password' => 'required'
    ]);

    if (User::where('email', $validateFields['email'])->exists()) {
      return redirect(route('user.signin'))->withErrors([
        'email' => 'Пользователь существует'
      ]);
    }

    $user = User::create($validateFields);
    if ($user) {
      Auth::login($user);
      return redirect()->to(route('home'));
    }

    return redirect(route('user.signup'))->withErrors([
      'formError' => 'Произошла ошибка при сохранении пользователя'
    ]);
  }

  public function logout()
  {
    if (Auth::logout()) {
      Auth::logout();
      return view(route('home'));
    }
  }
}
