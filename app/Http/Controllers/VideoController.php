<?php

namespace App\Http\Controllers;

use App\Http\Resources\VideoCollection;
use App\Http\Resources\VideoResource;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
    	return new VideoCollection( Video::all() );
    }

    public function show( Video $video )
    {
    	return new VideoResource( $video );
    }

    public function mark(Video $video, Request $request )
    {
        $request->user()->playedVideos()->sync( $video );
    }
}
