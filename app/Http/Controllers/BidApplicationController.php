<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BidApplicationController extends Controller
{
    // Fetch all bid applications
    public function index()
    {
        $bidApplications = DB::table('bid_applications')
            ->join('bids', 'bid_applications.bid_id', '=', 'bids.id')
            ->join('companies', 'bid_applications.company_id', '=', 'companies.id')
            ->join('users', 'companies.user_id', '=', 'users.id') // Join with users to get owner details
            ->select(
                'bid_applications.*',
                'bids.title as bid_title',
                'bids.category as bid_category',
                'companies.name as company_name',
                'companies.email as company_email',
                'users.name as owner_name', // Owner's name
                'users.email as owner_email' // Owner's email
            )
            ->get();
    
        return view('admin.applications.index', compact('bidApplications'));
    }

    public function myApplications()
{
    $userId = auth()->id(); // Get logged-in user's ID

    $bidApplications = DB::table('bid_applications')
        ->join('bids', 'bid_applications.bid_id', '=', 'bids.id')
        ->join('companies', 'bid_applications.company_id', '=', 'companies.id')
        ->where('companies.user_id', $userId) // Filter by the logged-in company owner
        ->select(
            'bid_applications.*',
            'bids.title as bid_title',
            'bids.category as bid_category',
            'companies.name as company_name',
            'companies.email as company_email'
        )
        ->get();

    return view('admin.applications.myapplication', compact('bidApplications'));
}

    

    // Show a single bid application by ID
    public function show($id)
    {
        $bidApplication = DB::table('bid_applications')->where('id', $id)->first();

        return view('admin.applications.show', compact('bidApplication'));
    }


    
    public function create()
    {



        $bids = DB::table('bids')->select('id', 'title')->get();
        $companies = DB::table('companies')->select('id', 'name')->get();
        return view('admin.applications.create', compact('bids', 'companies'));
    }


public function createMyApplication()
{

    $userId = auth()->id(); // Get the logged-in user's ID

    // Get the company of the logged-in user
    $company = DB::table('companies')
        ->where('user_id', $userId)
        ->select('id', 'name')
        ->first(); // Retrieve only one company

    if (!$company) {
        return redirect()->back()->with('error', 'You do not have a registered company.');
    }

    $bids = DB::table('bids')->select('id', 'title')->get();

    return view('admin.applications.createMyApplication', compact('bids', 'company'));
}









    public function edit($id)
    {
        $application = DB::table('bid_applications')->where('id', $id)->first();
        $bids = DB::table('bids')->select('id', 'title')->get();
        $companies = DB::table('companies')->select('id', 'name')->get();
        return view('admin.applications.edit', compact('application', 'bids', 'companies'));
    }
    
    public function store(Request $request)
    {
        // Validate input and ensure proposal_file is a PDF
        $request->validate([
            'bid_id' => 'required|exists:bids,id',
            'company_id' => 'required|exists:companies,id',
            'proposal_file' => 'required|file|mimes:pdf|max:5120', // Only PDF, max 5MB
            'status' => 'required|in:pending,approved,rejected',
        ]);
    
        // Handle the file upload
        if ($request->hasFile('proposal_file')) {
            $proposalPath = $request->file('proposal_file')->store('public/proposals');
            $proposalPath = str_replace('public/', 'storage/', $proposalPath);
        }
    
        // Insert bid application data
        DB::table('bid_applications')->insert([
            'bid_id' => $request->bid_id,
            'company_id' => $request->company_id,
            'proposal_file' => $proposalPath ?? null,
            'status' => $request->status,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        return redirect()->route('admin.applications.index')->with('success', 'Bid Application created successfully.');
    }
    

    // Update a bid application by ID
    public function update(Request $request, $id)
    {
        $data = $request->only(['bid_id', 'company_id', 'proposal_file', 'status']);
        DB::table('bid_applications')->where('id', $id)->update($data);

        return redirect()->route('admin.applications.index')->with('success', 'Bid Application updated successfully.');
    }

    // Delete a bid application by ID
    public function destroy($id)
    {
        DB::table('bid_applications')->where('id', $id)->delete();
        return redirect()->route('admin.applications.index')->with('success', 'Bid Application deleted successfully.');
    }
}
