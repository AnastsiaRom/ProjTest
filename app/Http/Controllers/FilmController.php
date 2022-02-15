<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class FilmController extends Controller
{
  public function index()
  {
    $film_list = Film::query()->get();

    return view('film.index', compact('film_list'));
  }

  public function create()
  {
    $genre_list = Genre::query()->get();

    return view('film.create', compact('genre_list'));
  }


  public function show(int $film_id)
  {
    $film = Film::findOrFail($film_id);

    return view('film.show', compact('film'));
  }



  public function store(Request $request)
  {
    $validated = $request->validate([
      'title' => 'required',
      'description' => 'required',
      'link' => 'required',
      'genre_id_list' => 'required',
    ]);

    $input = Arr::only($validated, [
      'title',
      'description',
      'link',
    ]);

    $film = new Film();
    $film->fill($input);
    $film->user_id = auth()->user()->id;

    $film->save();

    $film->genres()->sync($validated['genre_id_list']);

    return redirect(route('film.show', ['film_id' => $film->id]));
  }

  public function update(Request $request, int $film_id)
  {
    $validated = $request->validate([
      'title' => 'required',
      'description' => 'required',
      'link' => 'required',
      'genre_id_list' => 'required',
    ]);

    Film::whereId('films.id')->update($validated);

    return redirect(route('film.show'));
  }

  public function delete(int $film_id)
  {
    $film = Film::findOrFail($film_id);
    $film->delete();

    return redirect(route('film.show'));
  }
}
