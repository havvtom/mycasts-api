<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Scoping\Scoper;

class Video extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tags()
    {
    	return $this->belongsToMany( Tag::class, 'tag_video', 'video_id', 'tag_id' );
    }

    public function scopeWithScopes( Builder $builder, $scopes = [] )
    {
        return (new Scoper( request() ))->apply( $builder, $scopes );
    }
}
