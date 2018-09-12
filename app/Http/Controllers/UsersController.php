<?php

namespace App\Http\Controllers;

use App\User;
use App\Project;
use App\Company;
use Auth;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role_id == 1) {
            $users = User::all();

            return view('users.index' ,compact('users'));
        }
    }

    public function find(Request $request)
    {
      $user = User::findOrFail($request->name);

      return view('users.show', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user = User::findOrFail($user->id);
        $projects = project::where('user_id', $user->id)->get();
        $companies = company::where('user_id', $user->id)->get();


        return view('users.show', compact('user', 'projects', 'companies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $userUpdate = User::where('id', $user->id);

        $userUpdate->update([
            'first_name' => $request->input('first_name'),
            'middle_name' => $request->input('middle_name'),
            'last_name' => $request->input('last_name'),
            'name' => $request->input('name'),
            'mobile' => $request->input('mobile'),
            'city' => $request->input('city'),
            'email' => $request->input('email')
        ]);

        if ($userUpdate) {
            return redirect()->route('users.show', ['user'=>$user->id])
            ->with('success', 'User info updated successfully');
        }

        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $findUser = User::findOrFail($user->id);
        $findUser->projects()->delete();
        $findUser->companies()->delete();
        if ($findUser->delete()) {

            return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
        }

        return back()->withInput()->with('error', 'User could not be deleted for some reason.');
    }
}
