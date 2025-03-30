<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TechController extends Controller
{
    
    public function index()
    {

           $companies = Companies::where('status', 'approved')->get();
  
            return view('tech_companies.index', compact('companies'));
            
    }
}
