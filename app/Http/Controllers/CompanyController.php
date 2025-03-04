<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    
    

    // Show the logged-in user's company
    public function show()
    {
        $user = Auth::user();

        $company = DB::table('companies')->where('user_id', $user->id)->first();

        if (!$company) {
            return redirect()->route('admin.companies.create')->with('info', 'Please create your company profile.');
        }

        return view('admin.companies.show', compact('company'));
    }
}

