
@extends('layouts.app')


@section('title-block')
    ProjTest
@endsection

@section('content')

  @foreach ($film_list as $genre)
    <div class="mask d-flex align-items-center h-100 gradient-custom-2">
      <div class="row">
        <div class="col-sm-8">
          <div class="form-outline mb-2">
            <output type="text" id="form3Example3cg" name="{{ $genre->title }}" class="form-control form-control-lg" required="" autofocus="" placeholder="{{ $genre->title }}">
            <label class="form-label" for="form3Example3cg">{{ $genre->title }}</label>
          </div>

          {{-- <div class="form-group">
            <label for="path">Постер</label>
            <input type="text" name="path" placeholder="Загрузите фотографию" id="form3Example3cg" class="form-control form-control-lg">
          </div> --}}

          <div class="form-outline mb-2">
            <output type="text" id="form3Example3cg" name="{{ $genre->description }}" class="form-control form-control-lg" required="" autofocus="" placeholder="{{ $genre->description }}">
            <label class="form-label" for="form3Example3cg">{{ $genre->description }}</label>
          </div>

          <div class="form-outline mb-2">
            <output type="text" id="form3Example3cg" name="{{ $genre->link }}" class="form-control form-control-lg" required="" autofocus="" placeholder="{{ $genre->link }}">
            <label class="form-label" for="form3Example3cg">{{ $genre->link }}</label>
          </div>
        </div>

      </div>
    </div>
  @endforeach

@endsection
