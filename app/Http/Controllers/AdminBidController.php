<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminBidController extends Controller
{

    // Fetch all bids
    public function index()
    {
        $bids = DB::table('bids')->get();
        return view('admin.bids.index', compact('bids'));
    }

    // Show a single bid by ID
    public function show($id)
    {
        $bid = DB::table('bids')->where('id', $id)->first();
        return response()->json($bid);
    }


    public function create()
    {
        return view('admin.bids.create');
    }

    // Create a new bid
    public function store(Request $request)
    {
        $data = $request->only(['title', 'description', 'category', 'deadline', 'status', 'winner_company_id']);
        DB::table('bids')->insert($data);
      
        return redirect()->route('admin.bids.index')->with('success', 'Bid created successfully.');
    }

    public function edit($id)
    {
        $bid = DB::table('bids')->where('id', $id)->first();
        return view('admin.bids.edit', compact('bid'));
    }

    // Update a bid by ID
    public function update(Request $request, $id)
    {
        $data = $request->only(['title', 'description', 'category', 'deadline', 'status', 'winner_company_id']);
        DB::table('bids')->where('id', $id)->update($data);

        return redirect()->route('admin.bids.index')->with('success', 'Bid updated successfully.');
    }

    // Delete a bid by ID
    public function destroy($id)
    {
        DB::table('bids')->where('id', $id)->delete();


        return redirect()->route('admin.bids.index')->with('success', 'Bid deleted successfully.');
    }
}
