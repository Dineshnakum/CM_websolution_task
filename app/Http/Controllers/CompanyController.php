<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Mail\CompanyCreated;
use Illuminate\Support\Facades\Mail;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
            'website' => 'nullable|url|max:255',
        ]);
    
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            $validated['logo'] = $logoPath;
        }
    
        $company = Company::create($validated);
    
        Mail::to($request->email)->send(new CompanyCreated($company));
    
        return redirect()->route('companies.index')->with('success', 'Company created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'nullable|email',
            'logo' => 'nullable|image|dimensions:min_width=100,min_height=100',
            'website' => 'nullable|url',
        ]);

        if ($request->hasFile('logo')) {
            Storage::disk('public')->delete($company->logo);
            $validated['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $company->update($validated);
        return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        Storage::disk('public')->delete($company->logo);
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
    }
}
