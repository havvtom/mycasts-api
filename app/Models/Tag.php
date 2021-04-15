<?php

namespace App\Models;

use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function videos()
    {
    	return $this->belongsToMany(Video::class, 'tag_video', 'tag_id', 'video_id');
    }

}
