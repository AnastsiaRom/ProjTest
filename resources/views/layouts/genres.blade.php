@foreach($genres as $genreItem)
    <option value="{{ $genreItem->id ?? ''}}">
        @isset($category ->id)
            @if($category->paren_id == $genreItem->id)
                selected=""
            @endif

                @if($category->id == $genreItem->id)
                    disabled=""
                @endif
        @endisset

        {{ $delimiter ?? '' }}{{ $genreItem->category ?? '' }}
    </option>

    @isset($genreItem ->children)
        @include('layouts.genres', [
            'genres'=>$genreItem ->children,
             'delimiter' => ' - '. $delimiter
        ])
    @endisset
@endforeach
