<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index() {
        return view("");
    }

    public function create(Request $r) {
        $college_id = $r->college_id;
        return view("students.requests.create", compact("college_id"));
    }


    public function show(Request $r) {

    }

    public function edit(Request $r) {

    }




    public function delete(Request $r) {

    }


}
