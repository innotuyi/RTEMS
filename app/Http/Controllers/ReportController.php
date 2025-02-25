<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    // Generate a report for Bids
    public function generateBidsReport()
    {
        $bids = DB::table('bids')->get();
        return view('reports.bids', compact('bids'));
    }

    // Generate a report for Bid Applications
    public function generateBidApplicationsReport()
    {
        $bidApplications = DB::table('bid_applications')->get();
        return view('reports.bid_applications', compact('bidApplications'));
    }

    // Generate a report for Regulatory Approvals
    public function generateRegulatoryApprovalsReport()
    {
        $regulatoryApprovals = DB::table('regulatory_approvals')->get();
        return view('reports.regulatory_approvals', compact('regulatoryApprovals'));
    }

    // Generate a report for Notifications
    public function generateNotificationsReport()
    {
        $notifications = DB::table('notifications')->get();
        return view('reports.notifications', compact('notifications'));
    }
}
