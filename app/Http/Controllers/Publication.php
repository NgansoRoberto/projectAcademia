<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Publication extends Controller
{
    public function showPublication()
    {
        return view('publications.publications'); 
    }
}
