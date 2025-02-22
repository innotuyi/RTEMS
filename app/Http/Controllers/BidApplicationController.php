<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BidApplicationsController extends Controller
{
    // Fetch all bid applications
    public function index()
    {
        $bidApplications = DB::table('bid_applications')->get();
        return response()->json($bidApplications);
    }

    // Show a single bid application by ID
    public function show($id)
    {
        $bidApplication = DB::table('bid_applications')->where('id', $id)->first();
        return response()->json($bidApplication);
    }

    // Create a new bid application
    public function store(Request $request)
    {
        $data = $request->only(['bid_id', 'company_id', 'proposal_file', 'status']);
        DB::table('bid_applications')->insert($data);
        return response()->json(['message' => 'Bid Application created successfully.']);
    }

    // Update a bid application by ID
    public function update(Request $request, $id)
    {
        $data = $request->only(['bid_id', 'company_id', 'proposal_file', 'status']);
        DB::table('bid_applications')->where('id', $id)->update($data);
        return response()->json(['message' => 'Bid Application updated successfully.']);
    }

    // Delete a bid application by ID
    public function destroy($id)
    {
        DB::table('bid_applications')->where('id', $id)->delete();
        return response()->json(['message' => 'Bid Application deleted successfully.']);
    }
}
