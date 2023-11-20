<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Request as RequestModel;
use Illuminate\Support\Facades\Response;

class RequestController extends Controller
{


    public function create(Request $r) {
        $college_id = $r->college_id;
        return view("students.requests.create", compact("college_id"));
    }


    public function show(Request $r) {
        $request = RequestModel::whereId($r->id)->first();
        if(Auth::guard("student")->check()) {
            //for student
            return view("students.requests.show", compact("request"));
        } else {
            //for professors
            return view("professors.requests.show", compact("request"));
        }
    }

    public function edit(Request $r) {
        $request_id =$r->id;
        return view("students.requests.edit", compact("request_id"));

    }




    public function delete(Request $r) {
        $request_id =$r->id;
        RequestModel::whereId($request_id)->delete();
        $dir = public_path('assets/images/data/requests/' . $request_id);
            if (file_exists($dir))
                File::deleteDirectories($dir);
        return redirect()->route('student.profile',['tab'=>'requests']);
    }


    public function showFile(Request $r) {
        $request = RequestModel::whereId($r->id)->first();
        return response()->file(public_path('assets/images/data/requests/'.$request->id.'/'. $request->file),['content-type'=> 'application/pdf']);
    }


    public function downloadFile(Request $r) {
        $request = RequestModel::whereId($r->id)->first();
        return Response::download(public_path('assets/images/data/requests/'.$request->id.'/'. $request->file));

    }

    public function accept(Request $r) {
        $request_id =$r->id;
        return view("professors.requests.accept", compact("request_id"));
    }
    public function reject(Request $r) {
        $request_id =$r->id;
        return view("professors.requests.reject", compact("request_id"));

    }

    public function index()
    {
        $requests = RequestModel::all();
        return view('admins.requests.index', compact('requests'));
    }
}
