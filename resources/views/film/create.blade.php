@extends('layouts.app')

@section('content')
  <?php
  use App\Models\Genre;
  $genre_list = Genre::query()->get();;
  ?>

    <h1>Создание карточки фильма</h1>
    <form action="{{ route('film.store') }}" method="POST">
        @csrf

        <div class="form-outline mb-2">
            <input type="text" id="form3Example3cg" name="user_id" class="form-control form-control-lg" required="" autofocus="" placeholder="Имя создателя карточки" />
            <label class="form-label" for="form3Example3cg">Ваше имя</label>
        </div>

        <div class="form-outline mb-2">
            <input type="text" id="form3Example3cg" name="title" class="form-control form-control-lg" required="" autofocus="" placeholder="Введите название фильма" />
            <label class="form-label" for="form3Example3cg">Название</label>
        </div>

        <div class="form-group">
            <label for="path">Постер</label>
            <input type="text" name="path" placeholder="Загрузите фотографию" id="form3Example3cg" class="form-control form-control-lg">
        </div>

        <div class="form-group">
            <label for="img">
                <label for="img">Жанр</label>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Категория
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" >
                      <form action="{{ route('genre.store') }}" method="POST">

                        @foreach ($genre_list as $genre)
                          <li><a class="dropdown-item" href="#">{{ $genre->title }}</a></li>
                        @endforeach
                      </form>

                    </ul>
                </div>
            </label>
        </div>

        <div class="form-outline mb-2">
            <input type="text" id="form3Example3cg" name="description" class="form-control form-control-lg" required="" autofocus="" placeholder="Введите название фильма" />
            <label class="form-label" for="form3Example3cg">Описание фильма</label>
        </div>

        <div class="form-outline mb-2">
            <input type="text" id="form3Example3cg" name="link" class="form-control form-control-lg" required="" autofocus="" placeholder="Введите ссылку на фильм" />
            <label class="form-label" for="form3Example3cg">Ссылка на фильм</label>
        </div>

        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" name="sendMe" value="1">Сохранить карточку</button>
        </div>
    </form>

@endsection
