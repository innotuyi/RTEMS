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
            ->select(
                'bid_applications.*',
                'bids.title as bid_title',
                'bids.category as bid_category',
                'companies.name as company_name',
                'companies.email as company_email'
            )
            ->get();

        return view('admin.applications.index', compact('bidApplications'));
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
