<?php

namespace App\Http\Controllers;

use App\Project;
use App\Company;
use App\ProjectUser;
use App\User;
use Illuminate\Http\Request;
use Auth;

class ProjectsController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $projects = project::where('user_id', Auth::user()->id)->get();

            return view('projects.index', compact('projects'));
        }

        return view('auth.login');

    }

    public function create($company_id = null)
    {
        $companies = null;
        if (!$company_id) {
            $companies = Company::where('user_id', Auth::user()->id)->get();
        }

        return view('projects.create', ['company_id' => $company_id, 'companies'=>$companies]);
    }

    public function store(Request $request)
    {
        if (Auth::check()) {
            $project = new project;

            $project->user_id = Auth::user()->id;
            $project->name = $request->name;
            $project->description = $request->description;
            $project->company_id = $request->company_id;

            $project->save();
        }


        if ($project) {
            return redirect()->route('projects.show', ['project' => $project->id])
            ->with('success', "project created successfully");
        }

        return back()->withInput()->with('error', "Error creating new project");
    }

    public function show(project $project)
    {

        $project = Project::findOrFail($project->id);

        $comments = $project->comments;

        return view('projects.show', compact(['project', 'comments', 'users']));
    }

    public function edit(project $project)
    {
        $project = Project::findOrFail($project->id);

        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, project $project)
    {
        $projectUpdate = Project::where('id', $project->id);

        $projectUpdate->update([
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);

        if ($projectUpdate) {
            return redirect()->route('projects.show', ['project'=>$project->id])
            ->with('success', 'project updated successfully');
        }

        return back()->withInput();
    }

    public function destroy(project $project)
    {
        // dd($project);
        $findproject = Project::findOrFail($project->id);

        if ($findproject->delete()) {

            return redirect()->route('projects.index')
            ->with('success', 'project deleted successfully');
        }

        return back()->withInput()->with('error', 'project could not be deleted for some reason.');
    }
}
