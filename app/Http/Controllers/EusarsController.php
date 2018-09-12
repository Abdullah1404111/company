<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class EusarsController extends Controller
{
  public function index(Request $request)
  {
      $user = User::where('first_name', 'like', '%'.$request->name.'%')->get();

      return view('users.search', compact('user'));
  }
}
