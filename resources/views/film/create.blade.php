@extends('layouts.app')

@section('content')

    <h1>Создание карточки фильма</h1>
    <form action="{{ route('film.store') }}" method="POST">
      @csrf

      <div class="row">
        <div class="col-sm-8">
          <div class="form-outline mb-2">
            <input type="text" id="form3Example3cg" name="title" class="form-control form-control-lg" required="" autofocus="" placeholder="Введите название фильма" />
            <label class="form-label" for="form3Example3cg">Название</label>
          </div>

          {{-- <div class="form-group">
            <label for="path">Постер</label>
            <input type="text" name="path" placeholder="Загрузите фотографию" id="form3Example3cg" class="form-control form-control-lg">
          </div> --}}

          <div class="form-outline mb-2">
            <input type="text" id="form3Example3cg" name="description" class="form-control form-control-lg" required="" autofocus="" placeholder="Введите название фильма" />
            <label class="form-label" for="form3Example3cg">Описание фильма</label>
          </div>

          <div class="form-outline mb-2">
            <input type="text" id="form3Example3cg" name="link" class="form-control form-control-lg" required="" autofocus="" placeholder="Введите ссылку на фильм" />
            <label class="form-label" for="form3Example3cg">Ссылка на фильм</label>
          </div>
        </div>

        <div class="col-sm-4">
          <label for="genre_id_list">Жанр</label>
          <select name="genre_id_list[]" multiple>
            @foreach ($genre_list as $genre)
              <option value="{{ $genre->id }}">{{ $genre->title }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" name="sendMe" value="1">Сохранить карточку</button>
      </div>
    </form>

@endsection
