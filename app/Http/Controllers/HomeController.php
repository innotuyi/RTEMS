<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    

    public function index()    {

        
        return view('home');
    }
}
