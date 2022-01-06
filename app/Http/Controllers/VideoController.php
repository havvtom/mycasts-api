<?php

namespace App\Http\Controllers;

use App\Http\Resources\VideoCollection;
use App\Http\Resources\VideoResource;
use App\Models\Video;
use App\Scoping\Scopes\TagScope;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api'])->except(['index', 'show']);
    }

    public function index()
    {
        $videos = Video::withScopes( $this->scopes() )->paginate(2);

    	return new VideoCollection( $videos );
    }

    public function show( Video $video )
    {
    	return new VideoResource( $video );
    }

    public function mark(Video $video, Request $request )
    {
        $request->user()->playedVideos()->sync( $video );
    }

    public function store( Request $request )
    {
        //check if user has permission to create and edit
        if( !$request->user()->can('create video') ){
            abort(403);
        }

        //Validation
        $request->validate([
            'name' => 'required|min:4',
            'description' => 'required|min:4',
            'thumbnail' => 'required',
            'videoUrl' => 'required'
        ]);

        //Insert video
        $video = Video::create([
                    'name' => $request->name,
                    'description' => $request->description,
                    'thumbnail' => $request->thumbnail,
                    'videoUrl' => $request->videoUrl
                ]);

        $video->tags()->attach($request->tags);

        return new VideoResource( $video );
    }

    public function destroy( Video $video, Request $request )
    {
        //check if user has permission to create and edit
        if( !$request->user()->can('create video') ){
            abort(403);
        }

        $video->delete();
       
    }

    public function update(Video $video, Request $request)
    {
        //check if user has permission to create and edit
        if( !$request->user()->can('create video') ){
            abort(403);
        }

        //validation
        $request->validate([
            'name' => 'required|min:4',
            'description' => 'required|min:4',
            'thumbnail' => 'required',
            'videoUrl' => 'required'
        ]);

        $attributes = request()->only('name', 'description', 'thumbnail', 'videoUrl');

        $video->update($attributes);
        
        $video->tags()->sync($request->tags);

        return new VideoResource( $video );

    }

    protected function scopes()
    {
        return [
            'tag' => new TagScope()
        ];
    }
}


