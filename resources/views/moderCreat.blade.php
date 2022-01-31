@extends('layouts.app')

@section('content')
    <h1>Создание карточки фильма</h1>
    <form action="/moderCreat/submit" method="post">
        @csrf

        <div class="form-group">
            <label for="name">Имя создателя карточки</label>
            <input type="text" name="name" placeholder="Ваше имя" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="title">Введите название фильма</label>
            <input type="text" name="title" placeholder="Введите название фильма" id="title" class="form-control">
        </div>

        <div class="form-group">
            <label for="img">Заставка</label>
            <input type="text" name="img" placeholder="Заставка" id="img" class="form-control">
        </div>

        <div class="form-group">
            <label for="img">
                <label for="img">Жанр</label>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Категория
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Действие</a></li>
                        <li><a class="dropdown-item" href="#">Другое действие</a></li>
                        <li><a class="dropdown-item" href="#">Что-то еще здесь</a></li>
                    </ul>
                </div>
            </label>
        </div>

        <div class="form-group">
            <label for="information">Информация</label>
            <textarea name="description" placeholder="Введите название фильма" id="information" class="form-control" ></textarea>

        </div>
        <div class="form-group">
            <label for="img">Ссылка</label>
            <input type="text" name="link" placeholder="Заставка" id="img" class="form-control">
            <label></label>
        </div>
            <a class="btn btn-primary" href="{{ route('user.moderCreat') }}">Создать</a>
    </form>

@endsection
