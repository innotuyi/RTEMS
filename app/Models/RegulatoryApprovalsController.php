<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegulatoryApprovalsController extends Controller
{
    // Fetch all regulatory approvals
    public function index()
    {
        $regulatoryApprovals = DB::table('regulatory_approvals')->get();
        return response()->json($regulatoryApprovals);
    }

    // Show a single regulatory approval by ID
    public function show($id)
    {
        $regulatoryApproval = DB::table('regulatory_approvals')->where('id', $id)->first();
        return response()->json($regulatoryApproval);
    }

    // Create a new regulatory approval
    public function store(Request $request)
    {
        $data = $request->only(['company_id', 'product_id', 'status', 'comment', 'approved_by']);
        DB::table('regulatory_approvals')->insert($data);
        return response()->json(['message' => 'Regulatory Approval created successfully.']);
    }

    // Update a regulatory approval by ID
    public function update(Request $request, $id)
    {
        $data = $request->only(['company_id', 'product_id', 'status', 'comment', 'approved_by']);
        DB::table('regulatory_approvals')->where('id', $id)->update($data);
        return response()->json(['message' => 'Regulatory Approval updated successfully.']);
    }

    // Delete a regulatory approval by ID
    public function destroy($id)
    {
        DB::table('regulatory_approvals')->where('id', $id)->delete();
        return response()->json(['message' => 'Regulatory Approval deleted successfully.']);
    }
}
