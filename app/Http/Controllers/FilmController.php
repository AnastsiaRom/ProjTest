<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
  public function index()
  {
    // TODO: вернуть список фильмов по пользователю

    $film_list = Film::query()->get();

    return view('film.index', compact('film_list'));
  }

  public function create()
  {
    return view('film.create');
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
    ]);

    $film = new Film();
    $film->fill($validated);
    $film->user_id = auth()->user()->id;
    $film->save();

    return redirect(route('film.show', ['film_id' => $film->id]));
  }
}
