@extends('layouts.app')


@section('content')
    <h1>Жанры</h1>
    <div class="container">
        <a class="btn btn-primary" href="{{ route('genre.create') }}">Создать</a>

        <hr>
        <table class="table">
            <thead class="table">
                <tr>
                    <th>Наименование</th>
                    <th class="text-right">Действие</th>
                </tr>
            </thead>
            <tbody>
{{--            @forelse( $genres as $genre )--}}
                <tr>
                    <td>{{ $genres->category ?? '' }}</td>
                    <td class="text-right">
                        <a class="btn btn-primary" href="{{ route('genre.edit', $category) }}">Редактировать</a>
                    </td>

                </tr>

{{--            @empty--}}
                <tr>
                    <td colspan="2">
                        <h1 class="text">Жанр отсутствует</h1>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
