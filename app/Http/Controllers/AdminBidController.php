<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Companies;
use App\Notifications\NewBidNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminBidController extends Controller
{
    // Fetch all bids
    public function index()
    {
        $bids = Bid::all();
        return view('admin.bids.index', compact('bids'));
    }

    // Show a single bid by ID
    public function show($id)
    {
        $bid = Bid::findOrFail($id);
        return response()->json($bid);
    }

    // Show form to create a new bid
    public function create()
    {

        $companies = Companies::all();



        return view('admin.bids.create', compact('companies'));
    }

    // Store a new bid
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|in:software,hardware,consulting',
            'deadline' => 'required|date|after:today',
            'status' => 'required|in:open,closed,awarded',
            'budget' => 'required|numeric|min:0',
            'currency' => 'required|string|max:3',
            'evaluation_criteria' => 'nullable|string',
            'minimum_experience' => 'nullable|integer|min:0',
            'submission_method' => 'required|in:online,physical,email',            // 'bid_opening_date' => 'nullable|date|after_or_equal:deadline',
            'bid_document' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'location' => 'nullable|string|max:255',
            'contact_person' => 'nullable|string|max:255',
            'contact_email' => 'nullable|email|max:255',
            'requirements.*' => 'string|max:255',
            'attachments' => 'nullable|array',
            'attachments.*' => 'file|mimes:jpg,jpeg,png,pdf|max:2048',
            'winner_company_id' => 'nullable|exists:companies,id',
        ]);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();

        // Handle file uploads
        if ($request->hasFile('bid_document')) {
            $validated['bid_document'] = $request->file('bid_document')->store('bids/documents', 'public');
        }

        if ($request->hasFile('attachments')) {
            $validated['attachments'] = array_map(function ($file) {
                return $file->store('bids/attachments', 'public');
            }, $request->file('attachments'));
        }

        // Convert requirements to JSON format
        $validated['requirements'] = json_encode($validated['requirements'] ?? []);

        // Create the bid
       $bid= Bid::create($validated);

        $companies = Companies::where('status', 'approved')->get();

        foreach ($companies as $company) {
            $company->notify(new NewBidNotification($bid));
        }

        return redirect()->route('admin.bids.index')->with('success', 'Bid created successfully.');
    }

    // Show edit form
    public function edit($id)
    {
        $bid = Bid::findOrFail($id);
        return view('admin.bids.edit', compact('bid'));
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|in:software,hardware,consulting,construction,services',
            // 'deadline' => '|date|after:today',
            'status' => 'required|in:open,closed,awarded',
            'budget' => 'nullable|numeric|min:0',
            'currency' => 'required|string|max:3',
            'evaluation_criteria' => 'nullable|string',
            'minimum_experience' => 'nullable|integer|min:0',
            'submission_method' => 'nullable|in:online,physical,email',
            'bid_opening_date' => 'nullable|date|after_or_equal:deadline',
            'bid_document' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'location' => 'nullable|string|max:255',
            'contact_person' => 'nullable|string|max:255',
            'contact_email' => 'nullable|email|max:255',
            // 'requirements' => 'nullable|array',
            // 'requirements.*' => 'string|max:255',
            'attachments' => 'nullable|array',
            'attachments.*' => 'file|mimes:jpg,jpeg,png,pdf|max:2048',
            'winner_company_id' => 'nullable|exists:companies,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();
        $bid = Bid::findOrFail($id);

        // Handle file uploads
        if ($request->hasFile('bid_document')) {
            $validated['bid_document'] = $request->file('bid_document')->store('bids/documents', 'public');
        }

        if ($request->hasFile('attachments')) {
            $validated['attachments'] = array_map(function ($file) {
                return $file->store('bids/attachments', 'public');
            }, $request->file('attachments'));
        }

        // Convert requirements to JSON format
        $validated['requirements'] = json_encode($validated['requirements'] ?? []);

        // Update the bid
        $bid->update($validated);

        return redirect()->route('admin.bids.index')->with('success', 'Bid updated successfully.');
    }




    // Delete a bid by ID
    public function destroy($id)
    {
        $bid = Bid::findOrFail($id);
        $bid->delete();

        return redirect()->route('admin.bids.index')->with('success', 'Bid deleted successfully.');
    }
}
