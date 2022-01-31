@extends('layouts.app')

@section('content')
    <h1>Вы успешно авторизировались!</h1>
    @if(Auth::user()->isAdmin())
        Здравствуй, Admin! <a class="nav-link" href="/adminHome">За работу<span class="sr-only"></span></a>
    @endif

    @if(!Auth::user()->isAdmin())
        Здравствуй, Модератор! <a class="nav-link" href="/moderCreat">За работу<span class="sr-only"></span></a>

    @endif

    <a class="nav-link" href="/logout">Выйти из аккаунта<span class="sr-only"></span></a>
@endsection
