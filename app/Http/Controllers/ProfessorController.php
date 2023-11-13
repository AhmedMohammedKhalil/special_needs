<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfessorController extends Controller
{


    public function index()
    {
        $professors = Professor::all();
        return view('admins.professors.index', compact('professors'));
    }


    public function edit(Request $r)
    {
        $professor = Professor::whereId($r->id)->first();
        return view('admins.professors.edit', compact('professor'));
    }

    public function delete(Request $r)
    {
        Professor::destroy($r->id);
        return redirect()->route('admin.professors.index');
    }

    public function showLoginForm() {
        return view('professors.login');
    }

    public function dashboard() {
        //change
        $page_name = 'الإحصائيات';
        $professor_count = Professor::all()->count();
        return view('admins.dashboard',compact('page_name','professor_count'));
    }

    public function profile() {
        return view('professors.profile',['page_name' => 'البروفايل']);
    }

    public function settings() {
        return view('professors.settings',['page_name' => 'الإعدادات']);
    }

    public function changePassword() {
        return view('professors.changePassword',['page_name' => 'تغيير كلمة السر']);
    }

    public function logout(Request $request) {
        Auth::guard('professor')->logout();
        $request->session()->invalidate();
        return redirect()->route('home');
    }
}
