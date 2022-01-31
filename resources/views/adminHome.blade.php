@extends('layouts.app')



@section('content')
    <h1>Привет, админ</h1>
    @if(Auth::user()->isAdmin())
        Это видит только админ
    @endif
@endsection
