@extends('layouts.app')



@section('content')
    <h1>Привет, админ</h1>
    @if(Auth::user()->isAdmin())
        Это видит только админ
    @endif

    <div class="container">
        <form action="{{ route('genre.store') }}" method="post">
            @csrf
            @include('layouts._form')

        </form>
    </div>
@endsection
