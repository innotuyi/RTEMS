<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompaniesController extends Controller
{
    // Fetch all companies
    public function index()
    {
        $companies = DB::table('companies')->get();
        return response()->json($companies);
    }

    // Show a single company by ID
    public function show($id)
    {
        $company = DB::table('companies')->where('id', $id)->first();
        return response()->json($company);
    }

    // Create a new company
    public function store(Request $request)
    {
        $data = $request->only(['name', 'email', 'phone', 'website', 'industry', 'status', 'address', 'registration_certificate']);
        DB::table('companies')->insert($data);
        return response()->json(['message' => 'Company created successfully.']);
    }

    // Update a company by ID
    public function update(Request $request, $id)
    {
        $data = $request->only(['name', 'email', 'phone', 'website', 'industry', 'status', 'address', 'registration_certificate']);
        DB::table('companies')->where('id', $id)->update($data);
        return response()->json(['message' => 'Company updated successfully.']);
    }

    // Delete a company by ID
    public function destroy($id)
    {
        DB::table('companies')->where('id', $id)->delete();
        return response()->json(['message' => 'Company deleted successfully.']);
    }
}
