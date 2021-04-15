<?php

namespace App\Http\Resources;

use App\Http\Resources\VideoResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class VideoCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public $collects = VideoResource::class;

    public function toArray($request)
    {
        return [
            'data' => $this->collection
        ];
    }
}
