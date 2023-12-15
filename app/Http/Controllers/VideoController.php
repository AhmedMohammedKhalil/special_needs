<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $video= Video::all();
        return view('admins.videos.index', compact('video'));
    }


    public function edit(Request $r)
    {
        $video_id = Video::find($r->id)->id;
        return view('admins.videos.edit', compact('video_id'));
    }
}
