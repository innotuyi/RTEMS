<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
     public function store(Request $request)
     {
         $data = $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|email|unique:companies',
             'phone' => 'nullable|string|max:20',
             'website' => 'nullable|url',
             'industry' => 'required|string',
             'status' => 'required|in:pending,approved,rejected',
             'address' => 'required|string',
             'registration_certificate' => 'nullable|file|max:2048',
             'user_id' => 'required|exists:users,id',
         ]);
 
         // Handle file upload
         if ($request->hasFile('registration_certificate')) {
             $data['registration_certificate'] = $request->file('registration_certificate')->store('certificates');
         }
 
         DB::table('companies')->insert($data);
         return redirect()->route('admin.companies.index')->with('success', 'Company created successfully.');
     }
 
     // Show the form for editing a company
     public function edit($id)
     {
         $company = DB::table('companies')->find($id);
         return view('admin.companies.edit', compact('company'));
     }
 
     // Update a company record
     public function update(Request $request, $id)
     {
         $data = $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|email|unique:companies,email,' . $id,
             'phone' => 'nullable|string|max:20',
             'website' => 'nullable|url',
             'industry' => 'required|string',
             'status' => 'required|in:pending,approved,rejected',
             'address' => 'required|string',
             'registration_certificate' => 'nullable|file|max:2048',
             'user_id' => 'required|exists:users,id',
         ]);
 
         // Handle file upload
         if ($request->hasFile('registration_certificate')) {
             $data['registration_certificate'] = $request->file('registration_certificate')->store('certificates');
         }
 
         DB::table('companies')->where('id', $id)->update($data);
         return redirect()->route('admin.companies.index')->with('success', 'Company updated successfully.');
     }
 
     // Delete a company record
     public function destroy($id)
     {
         DB::table('companies')->where('id', $id)->delete();
         return redirect()->route('admin.companies.index')->with('success', 'Company deleted successfully.');
     }
}
