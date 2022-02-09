@extends('layouts.app')

@section('content')

  <form action="{{ route('genre.store') }}" method="POST">
    @csrf

    <div class="form-outline mb-2">
      <label class="form-label" for="form3Example3cg">Категория</label>

      <hr>

      <input type="text" id="form3Example3cg" name="title" class="form-control form-control-lg" required="" autofocus="" placeholder="Наименование категории" />
    </div>

    <div class="form-group">
      <select name="paren_id" class="form-control">
        <option value="0">-- без родительской категории --</option>

      </select>
    </div>

    <hr>

    <div class="d-flex justify-content-center">
      <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" name="sendMe" value="1">Создать категорию</button>
    </div>
  </form>
@endsection
