<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class NotificationsController extends Controller
{
    // Fetch all notifications
    public function index()
    {
        $notifications = DB::table('notifications')->get();
        return response()->json($notifications);
    }

    // Show a single notification by ID
    public function show($id)
    {
        $notification = DB::table('notifications')->where('id', $id)->first();
        return response()->json($notification);
    }

    // Create a new notification
    public function store(Request $request)
    {
        $data = $request->only(['user_id', 'message', 'type', 'read_at']);
        DB::table('notifications')->insert($data);
        return response()->json(['message' => 'Notification created successfully.']);
    }

    // Update a notification by ID
    public function update(Request $request, $id)
    {
        $data = $request->only(['user_id', 'message', 'type', 'read_at']);
        DB::table('notifications')->where('id', $id)->update($data);
        return response()->json(['message' => 'Notification updated successfully.']);
    }

    // Delete a notification by ID
    public function destroy($id)
    {
        DB::table('notifications')->where('id', $id)->delete();
        return response()->json(['message' => 'Notification deleted successfully.']);
    }
}
