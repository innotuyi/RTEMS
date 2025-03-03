<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    // Show form for user to create their company
    public function userCreate()
    {
        $user = Auth::user();

        // Check if user already has a company
        $company = DB::table('companies')->where('user_id', $user->id)->first();

        if ($company) {
            return redirect()->route('user.company.show')->with('info', 'You already have a registered company.');
        }

        return view('user.companies.create');
    }

    // Store user-created company
    public function store(Request $request)
    {
        $user = Auth::user();


    
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:companies,email',
            'phone' => 'nullable|string|max:20',
            'website' => 'nullable|url',
            'industry' => 'required|string|max:255',
            'address' => 'required|string',
            'registration_certificate' => 'nullable|file|mimes:pdf|max:2048',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $data = $validator->validated();
    
        $data['status'] = 'pending'; // Default status for user-created companies
        $data['user_id'] = $user->id;
    
        // Handle file upload
        if ($request->hasFile('registration_certificate')) {
            $data['registration_certificate'] = $request->file('registration_certificate')->store('certificates', 'public');
        }
    
        DB::table('companies')->insert($data);
    
        return redirect()->route('user.company.show')->with('success', 'Company created successfully and is pending approval.');
    }
    

    // Show the logged-in user's company
    public function show()
    {
        $user = Auth::user();

        $company = DB::table('companies')->where('user_id', $user->id)->first();

        if (!$company) {
            return redirect()->route('user.company.create')->with('info', 'Please create your company profile.');
        }

        return view('admin.companies.show', compact('company'));
    }
}

