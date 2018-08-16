<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Auth;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $companies = Company::where('user_id', Auth::user()->id)->get();

            return view('companies.index', compact('companies'));
        }

        return view('auth.login');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            $company = new Company;

            $company->user_id = Auth::user()->id;
            $company->name = $request->name;
            $company->description = $request->description;

            $company->save();
        }


        if ($company) {
            return redirect()->route('companies.show', ['company' => $company->id])
            ->with('success', "Company created successfully");
        }

        return back()->withInput()->with('error', "Error creating new company");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        
        $company = Company::findOrFail($company->id);

        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $company = Company::findOrFail($company->id);

        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $companyUpdate = Company::where('id', $company->id);

        $companyUpdate->update([
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);

        if ($companyUpdate) {
            return redirect()->route('companies.show', ['company'=>$company->id])
            ->with('success', 'Company updated successfully');
        }

        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        // dd($company);
        
        $findCompany = Company::findOrFail($company->id);
        $findCompany->projects()->delete();
        if ($findCompany->delete()) {

            return redirect()->route('companies.index')
            ->with('success', 'Company deleted successfully');
        }

        return back()->withInput()->with('error', 'Company could not be deleted for some reason.');
        
    }
}
