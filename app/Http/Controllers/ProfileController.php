<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function show()
    {
        // Fetch the logged-in user
        $user = Auth::user();

        // Fetch the user's profile from the users table using the query builder
        $profile = DB::table('users')->where('id', $user->id)->first();

        // Return the profile view with the fetched data
        return view('admin.users.profile', compact('profile'));
    }
}
