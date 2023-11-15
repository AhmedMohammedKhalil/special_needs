<?php

namespace App\Http\Controllers;

use App\Models\College;
use Illuminate\Http\Request;

class CollegeController extends Controller
{
    public function index()
    {
        $colleges = College::all();
        return view('admins.colleges.index', compact('colleges'));
    }


    public function edit(Request $r)
    {
        $college = College::whereId($r->id)->first();
        return view('admins.colleges.edit', compact('college'));
    }

    public function show(Request $r)
    {
        $college = College::whereId($r->id)->first();
        return view('admins.colleges.show', compact('college'));
    }

    public function delete(Request $r)
    {
        College::destroy($r->id);
        return redirect()->route('admin.colleges.index');
    }
}
