<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use app\Models\User;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public $collects = UserResource::class;

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'playedVideos' => $this->playedVideos()->pluck('video_id'),
            'admin' => $this->hasRole('admin')
        ];
    }
}
