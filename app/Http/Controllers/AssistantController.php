<?php

namespace App\Http\Controllers;

use App\Models\Assistant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AssistantController extends Controller
{
    public function create(Request $r) {
        return view("students.assistant.create");
    }

    public function edit(Request $r) {
        $assistant_id =$r->id;
        return view("students.assistant.edit", compact("assistant_id"));

    }

    public function delete(Request $r) {
        $assistant_id =$r->id;
        Assistant::whereId($assistant_id)->delete();
        return redirect()->route('student.profile',['tab'=>'profile']);
    }
}
