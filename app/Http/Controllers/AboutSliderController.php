<?php

namespace App\Http\Controllers;

use App\Models\AboutSlider;
use Illuminate\Http\Request;

class AboutSliderController extends Controller
{
    public function index()
    {
        $aboutsliders = AboutSlider::all();
        return view('admins.aboutsliders.index', compact('aboutsliders'));
    }


    public function edit(Request $r)
    {
        $aboutslider = AboutSlider::find($r->id);
        return view('admins.aboutsliders.edit', compact('aboutslider'));
    }
    
    public function show(Request $r)
    {
        $aboutslider = AboutSlider::find($r->id);
        return view('admins.aboutsliders.show', compact('aboutslider'));
    }

    public function delete(Request $r)
    {
        AboutSlider::destroy($r->id);
        return redirect()->route('admin.aboutslider.index');
    }
}
