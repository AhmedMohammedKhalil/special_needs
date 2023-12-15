<?php

namespace App\Http\Controllers;

use App\Models\Galary;
use Illuminate\Http\Request;

class GalaryController extends Controller
{
    public function index()
    {
        $galaries = Galary::all();
        return view('admins.galaries.index', compact('galaries'));
    }


    public function edit(Request $r)
    {
        $galary= Galary::whereId($r->id)->first();
        return view('admins.galaries.edit', compact('galary'));
    }

    public function delete(Request $r)
    {
        Galary::destroy($r->id);
        return redirect()->route('admin.galary.index');
    }
}
