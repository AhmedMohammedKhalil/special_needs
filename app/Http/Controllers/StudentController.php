<?php

namespace App\Http\Controllers;


use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function showLoginRegister(){
        return view('students.login_register');

    }
    public function dashboard() {
        //change
        $page_name = 'الإحصائيات';
        $professor_count = Professor::all()->count();
        return view('admins.dashboard',compact('page_name','professor_count'));
    }

    public function profile() {
        return view('students.profile',['page_name' => 'البروفايل']);
    }

    public function settings() {
        return view('students.settings',['page_name' => 'الإعدادات']);
    }

    public function changePassword() {
        return view('students.changePassword',['page_name' => 'تغيير كلمة السر']);
    }

    public function logout(Request $request) {
        Auth::guard('student')->logout();
        $request->session()->invalidate();
        return redirect()->route('home');
    }
}
