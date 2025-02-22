<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BidsController extends Controller
{
    // Fetch all bids
    public function index()
    {
        $bids = DB::table('bids')->get();
        return response()->json($bids);
    }

    // Show a single bid by ID
    public function show($id)
    {
        $bid = DB::table('bids')->where('id', $id)->first();
        return response()->json($bid);
    }

    // Create a new bid
    public function store(Request $request)
    {
        $data = $request->only(['title', 'description', 'category', 'deadline', 'status', 'winner_company_id']);
        DB::table('bids')->insert($data);
        return response()->json(['message' => 'Bid created successfully.']);
    }

    // Update a bid by ID
    public function update(Request $request, $id)
    {
        $data = $request->only(['title', 'description', 'category', 'deadline', 'status', 'winner_company_id']);
        DB::table('bids')->where('id', $id)->update($data);
        return response()->json(['message' => 'Bid updated successfully.']);
    }

    // Delete a bid by ID
    public function destroy($id)
    {
        DB::table('bids')->where('id', $id)->delete();
        return response()->json(['message' => 'Bid deleted successfully.']);
    }
}
