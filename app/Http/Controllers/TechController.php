<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TechController extends Controller
{
    
    public function index()
    {

            $companies = DB::table('companies')->get();
  
            return view('tech_companies.index', compact('companies'));
            
    }
}
