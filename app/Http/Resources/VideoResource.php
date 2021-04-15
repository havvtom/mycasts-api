<?php

namespace App\Http\Resources;

use App\Http\Resources\TagCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class VideoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'videoUrl' => $this->videoUrl,
            'thumbnail' => $this->thumbnail,
            'tags' => new TagCollection( $this->tags )
        ];
    }
}
