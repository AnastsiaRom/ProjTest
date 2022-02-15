<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Film;
use App\Models\Genre;

class PortalController extends Controller
{
  public function index()
  {
    $film_list = Film::query()->get();
    $genre_list = Genre::query()->get();

    // $genre_id_list = $request->genre_id_list;
    // $film_list = Film::query()
    //   ->whereHas([
    //     'genres' => function ($query) use ($genre_id_list) {
    //       $query->whereIn('genres.id', $genre_id_list);
    //     },
    //   ])->get();

    return view('index', compact('genre_list', 'film_list'));
  }

  public function home()
  {
    return view('home');
  }
}
