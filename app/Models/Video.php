<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tags()
    {
    	return $this->belongsToMany( Tag::class, 'tag_video', 'video_id', 'tag_id' );
    }
}