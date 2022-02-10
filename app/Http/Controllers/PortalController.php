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
    return view('index', compact('genre_list', 'film_list'));
  }

  public function home()
  {
    return view('home');
  }
}
