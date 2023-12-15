<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AboutSlider;
use App\Models\College;
use App\Models\Galary;
use App\Models\Student;
use App\Models\Professor;
use App\Models\Request as RequestModel;
use App\Models\Video;
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
        $about = About::where('type','من نحن')->first();
        $slider = Video::Limit(1)->first();
        $galleries = Galary::all();
        return view('home',compact('colleges','professors','about','slider','galleries'));
    }

    public function aboutus()
    {
        $abouts = About::all();
        $aboutsliders = AboutSlider::all();
        return view('aboutus',compact('abouts','aboutsliders'));
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
