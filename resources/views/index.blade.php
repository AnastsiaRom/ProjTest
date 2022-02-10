@extends('layouts.app')


@section('title-block')
    ProjTest
@endsection

@section('content')
    <h1>Главная страница</h1>

    <div class="row">
      <div class="col-sm-4">
        <label for="genre_id_list">Жанр</label>

          <select name="genre_id_list[]" multiple>
            @foreach ($genre_list as $genre)
              <option value="{{ $genre->id }}">{{ $genre->title }}</option>
            @endforeach
          </select>
        </div>
    </div>

      <div class="card-container d-flex flex-row">
        @foreach ($film_list as $film)
          <div class="card">
            <div> <b>title:</b> {{ $film->title }} </div>
            <div> <b>description:</b> {{ $film->description }} </div>
            <div> <b>link:</b> {{ $film->link }} </div>
          </div>
        @endforeach
      </div>

      {{-- @foreach ($film_list as $film)
        <div class="col-sm-8">
          <div class="mask d-flex align-items-center h-100 gradient-custom-2">
            <div class="row">
              <div class="col-sm-8">
                <div class="form-outline mb-2">
                  <output type="text" id="form3Example3cg" name="{{ $film->title }}" class="form-control form-control-lg" required="" autofocus="" placeholder="{{ $film->title }}">
                  <label class="form-label" for="form3Example3cg">{{ $film->title }}</label>
                </div>

                  <div class="form-group">
                    <label for="path">Постер</label>
                    <input type="text" name="path" placeholder="Загрузите фотографию" id="form3Example3cg" class="form-control form-control-lg">
                  </div>

                <div class="form-outline mb-2">
                  <output type="text" id="form3Example3cg" name="{{ $film->description }}" class="form-control form-control-lg" required="" autofocus="" placeholder="{{ $film->description }}" />
                  <label class="form-label" for="form3Example3cg">{{ $film->description }}</label>
                </div>

                <div class="form-outline mb-3">
                  <output type="text" id="form3Example3cg" name="{{ $film->link }}" class="form-control form-control-lg" required="" autofocus="" placeholder="{{ $film->link }}" />
                  <label class="form-label" for="form3Example3cg">{{ $film->link }}</label>
                </div>
              </div>

            </div>
        </div>
    </div>
    @endforeach --}}
  </div>

  <style>
    .card-container {
      gap: 16px;
    }
    .card {
      background-color: lightblue;
      border: 1px solid black;
      padding: 16px;
      min-width: 200px;
    }

  </style>


@endsection

