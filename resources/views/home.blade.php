@extends('layouts.app')

@section('content')
  <h1>Вы успешно авторизировались!</h1>

  @if(Auth::user()->isAdmin())
    Здравствуй, Admin! <a class="nav-link" href="{{ route('genre.create') }}">За работу<span class="sr-only"></span></a>
  @else
    Здравствуй, Модератор! <a class="nav-link" href="{{ route('film.create') }}">Создать фильм<span class="sr-only"></span></a>
  @endif

  <a class="nav-link" href="{{ route('auth.logout') }}">Выйти из аккаунта<span class="sr-only"></span></a>
@endsection
