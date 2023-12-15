<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $abouts= About::all();
        return view('admins.abouts.index', compact('abouts'));
    }


    public function edit(Request $r)
    {
        $about = About::find($r->id);
        if($about->type == "من نحن"){
            return view('admins.abouts.editph', compact('about'));
        }
        else{
            return view('admins.abouts.edit', compact('about'));
        }
    }

    public function show(Request $r)
    {
        $about = About::find($r->id);
        return view('admins.abouts.show', compact('about'));
    }
}
