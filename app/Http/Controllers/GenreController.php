<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
  public function index()
  {
    $genre_list = Genre::query()->get();

    return view('genre.index', compact('genre_list'));
  }

  public function create()
  {
    return view('genre.create');
  }


  public function show(int $genre_id)
  {
    $genre = Genre::findOrFail($genre_id);

    return view('genre.show', compact('genre'));
  }



  public function store(Request $request)
  {
    $validated = $request->validate([
      'title' => 'required',
    ]);

    $genre = new Genre();
    $genre->fill($validated);
    $genre->save();

    return redirect(route('genre.show', ['genre_id' => $genre->id]));
  }
}
