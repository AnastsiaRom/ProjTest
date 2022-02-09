
@extends('layouts.app')


@section('title-block')
    ProjTest
@endsection

@section('content')

  @foreach ($film_list as $genre)
    <div class="mask d-flex align-items-center h-100 gradient-custom-2">
      <div class="form-outline mb-2">
        <input type="text" id="form3Example3cg" name="{{ $genre->title }}" class="form-control form-control-lg" required="" autofocus="" placeholder="{{ $genre->title }}" />
      </div>
      <div class="form-outline mb-2">
        <input type="text" id="form3Example3cg" name="{{ $genre->description }}" class="form-control form-control-lg" required="" autofocus="" placeholder="{{ $genre->description }}" />
      </div>
      <div class="form-outline mb-2">
        <input type="text" id="form3Example3cg" name="{{ $genre->link }}" class="form-control form-control-lg" required="" autofocus="" placeholder="{{ $genre->link }}" />
      </div>
    </div>
  @endforeach

@endsection
