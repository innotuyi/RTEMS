<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    // Fetch all users
    public function index()
    {
        $users = DB::table('users')->get();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {

        return view('admin.users.create');

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
       
        return redirect()->back()->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id); // Use Eloquent to retrieve the user
        return view('admin.users.edit', compact('user'));
    }

    // Update a user by ID
    public function update(Request $request, User $user)
    {
        $data = $request->only(['name', 'email', 'password', 'phone', 'role']);
    
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }
    
        $user->update($data);

        return redirect()->back()->with('success', 'User updated successfully.');
    }
    

    // Delete a user by ID
    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();

        return  redirect()->back()->with('success', 'User deleted successfully.');
    }

}