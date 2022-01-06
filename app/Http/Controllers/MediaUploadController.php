<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaUploadController extends Controller
{
    
    public function mediaUploadPost(Request $request)
    {
        //check if user has permission to create and edit
        if( !$request->user()->can('create video') ){
            abort(403);
        }
        //Validate
        // $request->validate([
        //     'media' => 'required|media|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        //Store media in S3 bucket
        $mediaPath = Storage::disk('s3')->put('media', $request->media);
        $mediaPath = Storage::disk('s3')->url($mediaPath);
    
        return $mediaPath; 
    }

}
