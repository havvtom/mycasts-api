<?php

namespace App\Http\Resources;

use App\Http\Resources\VideoCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class TagResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //ids to be used in frontend for updating the tagged videos 
        $video_ids = $this->videos->map( function ($video) {
            return $video->id;
        });

        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'number_of_videos_tagged' => $this->videos->count(),
            'video_ids' => $video_ids
        ];
    }
}
