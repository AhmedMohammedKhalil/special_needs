<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Models\Student;
use App\Models\Professor;
use App\Models\Interview;
use App\Models\Request as RequestModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLoginForm() {
        return view('admins.login');
    }

    public function dashboard() {

        $page_name = 'الإحصائيات';
        $professors = Professor::all();
        $students = Student::all();
        $colleges = College::all();
        $requests = RequestModel::all();
        $interviews = Interview::all();
        return view('admins.dashboard',compact('page_name','professors','students','colleges','requests','interviews'));
    }

    public function profile() {
        return view('admins.profile',['page_name' => 'البروفايل']);
    }

    public function settings() {
        return view('admins.settings',['page_name' => 'الإعدادات']);
    }

    public function changePassword() {
        return view('admins.changePassword',['page_name' => 'تغيير كلمة السر']);
    }

    public function logout(Request $request) {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        return redirect()->route('home');
    }
}
