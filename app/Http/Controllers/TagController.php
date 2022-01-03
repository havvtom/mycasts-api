<?php

namespace App\Http\Controllers;

use App\Http\Resources\TagCollection;
use App\Models\Tag;
use Illuminate\Support\Str;
use App\Http\Resources\TagResource;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api'])->except(['index']);
    }

    public function index()
    {
    	return new TagCollection( Tag::all() );
    }

    public function store( Request $request )
    {
        //check if user has permission to create and edit
        if( !$request->user()->can('create video') ){
            abort(403);
        }

        //Validation
        $request->validate([
            'title' => 'required|min:4|max:20|unique:tags,title',
        ]);

        //Insert tag
        $tag = Tag::create([
                    'title' => $request->title,
                    'slug' => Str::slug($request->title, '-')
                ]);


        return new TagResource( $tag );
    }

    public function update( Tag $tag, Request $request )
    {
         //check if user has permission to create and edit
        if( !$request->user()->can('create video') ){
            abort(403);
        }

        //validation
        $request->validate([
            'title' => 'required|min:3|max:20',
        ]);

        $tag->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-')
        ]);

        return new TagResource( $tag );
    }

    public function destroy( Tag $tag, Request $request )
    {
        //check if user has permission to create and edit
        if( !$request->user()->can('create video') ){
            abort(403);
        }

        $tag->delete();
       
    }
}
