<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Interview;
use Illuminate\Support\Facades\Auth;

class InterviewController extends Controller
{

    public function create(Request $r) {
    }


    public function show(Request $r) {
        $interview = Interview::whereId($r->id)->first();
        if(Auth::guard("student")->check()) {
            //for student
            return view("students.interviews.show", compact("interview"));
        } else {
            //for professors
            return view("professors.interviews.show", compact("interview"));
        }
    }

    public function edit(Request $r) {
        $interview_id =$r->id;
        return view("professors.interviews.edit", compact("interview_id"));
    }


    public function accept(Request $r) {
        $interview = Interview::whereId($r->id)->first();
        $interview->update(['status'=>'تمت الموافقة']);
        return redirect()->route('student.profile', ['tab'=>'interviews']);

    }

    public function reject(Request $r) {
        $interview_id = $r->id;
        return view('students.interviews.reject', compact('interview_id'));
    }

    public function delete(Request $r) {
        $interview=Interview::find($r->id);
        $interview->delete();
        return redirect()->route('professor.profile',['tab' => 'interviews']);
    }

    public function index()
    {
        $interviews = Interview::all();
        return view('admins.interviews.index', compact('interviews'));
    }
}
