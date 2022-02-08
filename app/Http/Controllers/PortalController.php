<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PortalController extends Controller
{
  public function index()
  {
    return view('index');
  }

  public function home()
  {
    return view('home');
  }
}
