<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Models\Student;
use App\Models\Professor;
use App\Models\Request as RequestModel;
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

    public function aboutus()
    {
        $professors = Professor::all();
        $students = Student::all();
        $colleges = College::all();
        return view('aboutus',compact('colleges','professors','students'));
    }

    public function search()
    {
        $colleges = College::all();
        return view('search',compact('colleges'));
    }


    public function colleges()
    {
        $colleges = College::all();
        return view('colleges',compact('colleges'));
    }


    public function showCollege(Request $r)
    {
        $college = College::whereid($r->id)->first();
        return view('college_details',compact('college'));
    }
}
