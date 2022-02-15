<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Film;

class HomeController extends Controller
{
  public function sorts()
  {
    $sorts = Film::query()->sortBy()->get();
  }
}
