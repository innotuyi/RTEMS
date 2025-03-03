<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminCompanyController extends Controller
{
     // Display a listing of companies
     public function index()
     {
         $companies = DB::table('companies')->get();
         return view('admin.companies.index', compact('companies'));
     }
 
     // Show the form for creating a new company
     public function create()
     {
         // Fetch all users
         $users = DB::table('users')->select('id', 'name')->get();
     
         // Pass the users to the create view
         return view('admin.companies.create', compact('users'));
     }
     
 
     // Store a newly created company
    //  public function store(Request $request)
    //  {
    //      $data = $request->validate([
    //          'name' => 'required|string|max:255',
    //          'email' => 'required|email|unique:companies',
    //          'phone' => 'nullable|string|max:20',
    //          'website' => 'nullable|url',
    //          'industry' => 'required|string',
    //          'status' => 'required|in:pending,approved,rejected',
    //          'address' => 'required|string',
    //          'registration_certificate' => 'nullable|file|max:2048',
    //          'user_id' => 'required|exists:users,id',
    //      ]);
 
    //      // Handle file upload
    //      if ($request->hasFile('registration_certificate')) {
    //          $data['registration_certificate'] = $request->file('registration_certificate')->store('certificates');
    //      }
 
    //      DB::table('companies')->insert($data);
    //      return redirect()->route('admin.companies.index')->with('success', 'Company created successfully.');
    //  }



    public function store(Request $request)
    {
        $user = auth()->user();
    
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:companies,email',
            'phone' => 'nullable|string|max:20',
            'website' => 'nullable|url',
            'industry' => 'required|string|max:255',
            'address' => 'required|string',
            'registration_certificate' => 'nullable|file|mimes:pdf|max:2048',
            'mission' => 'nullable|string|max:1000',
            'target' => 'nullable|string|max:1000',
            'achievements' => 'nullable|string|max:1000',
            'number_of_employees' => 'nullable|integer',
            'education_level' => 'nullable|string|max:255',
            'company_experience' => 'nullable|string|max:1000',
            'partners' => 'nullable|string|max:1000',
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
    
        return redirect()->route('admin.companies.show')->with('success', 'Company created successfully and is pending approval.');
    }
    


    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:companies,email,' . $id,
            'phone' => 'nullable|string|max:20',
            'website' => 'nullable|url',
            'industry' => 'required|string|max:255',
            'address' => 'required|string',
            'registration_certificate' => 'nullable|file|mimes:pdf|max:2048',
            'mission' => 'nullable|string',
            'target' => 'nullable|string',
            'achievements' => 'nullable|string',
            'number_of_employees' => 'nullable|integer|min:0',
            'education_level' => 'nullable|string|max:255',
            'company_experience' => 'nullable|integer|min:0',
            'partners' => 'nullable|string',
            'company_type' => 'required|in:Private,Public,NGO,Other',
            'company_category' => 'required|in:Startup,SME,Enterprise',
            'status' => 'required|in:pending,approved,rejected',
            'reason' => 'nullable|string|required_if:status,rejected',
            'user_id' => 'required|exists:users,id',
        ]);
    
        // Handle file upload
        if ($request->hasFile('registration_certificate')) {
            $data['registration_certificate'] = $request->file('registration_certificate')->store('certificates', 'public');
        }
    
        DB::table('companies')->where('id', $id)->update($data);
    
        return redirect()->route('admin.companies.index')->with('success', 'Company updated successfully.');
    }
    
 
     // Show the form for editing a company
     public function edit($id)
     {
         $company = DB::table('companies')->find($id);
         return view('admin.companies.edit', compact('company'));
     }


   


 
     // Update a company record
  
 
     // Delete a company record
     public function destroy($id)
     {
         DB::table('companies')->where('id', $id)->delete();
         return redirect()->route('admin.companies.index')->with('success', 'Company deleted successfully.');
     }


       // Show the logged-in user's company
    public function show()
    {
        $user = auth()->user();

        $company = DB::table('companies')->where('user_id', $user->id)->first();

        if (!$company) {
            return redirect()->route('admin.companies.create')->with('info', 'Please create your company profile.');
        }

        return view('admin.companies.show', compact('company'));
    }
}
