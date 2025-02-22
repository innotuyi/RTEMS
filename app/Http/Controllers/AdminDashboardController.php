<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    /**
     * Display the admin dashboard with statistics.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         // Example data for program statistics
    $programStatsLabels = ['Approved', 'Pending', 'Rejected', 'In Progress']; // Add your own labels
    $programStatsData = [
        DB::table('bids')->where('status', 'approved')->count(),
        DB::table('bids')->where('status', 'pending')->count(),
        DB::table('bids')->where('status', 'rejected')->count(),
        DB::table('bids')->where('status', 'in_progress')->count(),
    ];
        // Get the total number of bids
        $totalBids = DB::table('bids')->count();
    
        // Get the total number of bid applications
        $totalBidApplications = DB::table('bid_applications')->count();
    
        // Get the total number of regulatory approvals
        $totalRegulatoryApprovals = DB::table('regulatory_approvals')->count();
    
        // Get the total number of notifications
        $totalNotifications = DB::table('notificatons')->count();
    
        // Get the number of open bids
        $openBids = DB::table('bids')->where('status', 'open')->count();
    
        // Get the number of awarded bids
        $awardedBids = DB::table('bids')->where('status', 'awarded')->count();
    
        // Get the number of approved regulatory approvals
        $approvedRegulatoryApprovals = DB::table('regulatory_approvals')->where('status', 'approved')->count();
    
        // Get the number of unread notifications
        $unreadNotifications = DB::table('notificatons')->whereNull('read_at')->count();
    
        // Dynamic user growth data (user registration per month)
        $userGrowthData = DB::table('users')
            ->selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();
    
        $userGrowthLabels = [];
        $userGrowthValues = [];
    
        // Prepare data for the chart
        foreach ($userGrowthData as $data) {
            $userGrowthLabels[] = $data->year . '-' . str_pad($data->month, 2, '0', STR_PAD_LEFT);  // Format as Year-Month (e.g., 2024-01)
            $userGrowthValues[] = $data->count;
        }
    
        // Return the statistics to the admin dashboard view
        return view('admin.pages.index', compact(
            'totalBids',
            'totalBidApplications',
            'totalRegulatoryApprovals',
            'totalNotifications',
            'openBids',
            'awardedBids',
            'approvedRegulatoryApprovals',
            'unreadNotifications',
            'userGrowthLabels',
            'userGrowthValues',
            'programStatsLabels',    // Add this line
            'programStatsData'      // Add this line
        ));
    }
    
}
