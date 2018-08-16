<?php

namespace App\Http\Controllers;
use App\Company;
use App\Project;
use App\User;
use App\Role;
use Auth;
use Illuminate\Http\Request;

class AdminCompaniesController extends Controller
{
	public function index()
	{
	    if (Auth::user()->role_id == 1) {
	    	$companies = Company::all();

	    	return view('admin.companies.index' ,compact('companies'));
	    }
	}

	public function pindex()
	{
	    if (Auth::user()->role_id == 1) {
	    	$projects = Project::all();

	    	return view('admin.projects.index' ,compact('projects'));
	    }
	}

	public function ushow(User $user)
	{
	    if (Auth::user()->role_id == 1) {
	    	$user = User::findOrFail($user->id);
	    	
	    	return view('admin.users.show' ,compact('users'));
	    }
	}

	public function urole()
	{
	    if (Auth::user()->role_id == 1) {
	    	$roles = Role::all();

	    	return view('admin.roles.index' ,compact('roles'));
	    }
	}

}
