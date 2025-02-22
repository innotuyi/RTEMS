<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB ;

class UsersController extends Controller
{
    // Fetch all users
    public function index()
    {
        $users = DB::table('users')->get();
        return response()->json($users);
    }

    // Show a single user by ID
    public function show($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        return response()->json($user);
    }

    // Create a new user
    public function store(Request $request)
    {
        $data = $request->only(['name', 'email', 'password', 'phone', 'role', 'company_id']);
        $data['password'] = bcrypt($request->password); // Encrypt password

        DB::table('users')->insert($data);
        return response()->json(['message' => 'User created successfully.']);
    }

    // Update a user by ID
    public function update(Request $request, $id)
    {
        $data = $request->only(['name', 'email', 'password', 'phone', 'role', 'company_id']);
        if ($request->password) {
            $data['password'] = bcrypt($request->password); // Encrypt password
        }

        DB::table('users')->where('id', $id)->update($data);
        return response()->json(['message' => 'User updated successfully.']);
    }

    // Delete a user by ID
    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return response()->json(['message' => 'User deleted successfully.']);
    }
}
