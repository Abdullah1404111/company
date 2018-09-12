<?php

namespace App\Http\Controllers;
use App\Project;
use App\User;
use Illuminate\Http\Request;

class ProjectUsersController extends Controller
{
  public function addUser(Request $request)
  {
      return $request->all();

  }
}
