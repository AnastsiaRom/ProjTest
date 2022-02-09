
@extends('layouts.app')


@section('title-block')
    ProjTest
@endsection

@section('content')
  @foreach ($genre_list as $genre)
    <div>{{ $genre->title }}</div>
  @endforeach
@endsection
