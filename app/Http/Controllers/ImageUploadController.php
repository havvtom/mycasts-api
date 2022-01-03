<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
    
    public function imageUploadPost(Request $request)
    {
        //Validate
        // $request->validate([
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        //Store media in S3 bucket
        $imagePath = Storage::disk('s3')->put('images', $request->image);
        $imagePath = Storage::disk('s3')->url($imagePath);

        // $videoPath = Storage::disk('s3')->put('video', $request->video);
        // $videoPath = Storage::disk('s3')->url($videoPath);

        // $mediaPaths = [];
        // $mediaPaths['image_url'] = $imagePath;
        // $mediaPaths['video_url'] = $videoPath;
    
        return $imagePath; 
    }

}
