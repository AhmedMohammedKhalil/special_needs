<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Models\Professor;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $colleges = College::all();
        $professors = Professor::all();
        return view('home',compact('colleges','professors'));
    }
}
