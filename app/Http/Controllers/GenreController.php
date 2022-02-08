<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
  public function index()
  {
    // TODO: вернуть список категорий

    // $film_list = Genre::get();
    // return view('', compact('genre_list'));
  }

  public function create()
  {
    return view('genre.create');
  }


  public function show(int $genre_id)
  {
    // TODO: Достать категорию по id и вернуть

    return redirect(route('genre.show', ['genre_id' => $genres->id]));
    // return view('genre.show') ;
  }



  public function store(Request $request)
  {
    // TODO: Сохранить категорию

    $validated = $request->validate([
      'category' => 'required',
    ]);

    $genres = new Genre();
    $genres->fill($validated);
    //$genre->user_id = auth()->user()->id;
    $genres->save();

    return redirect(route('genre.show', ['paren_id' => $genres->id]));
  }
}
