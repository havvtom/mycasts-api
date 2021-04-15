<?php

namespace Tests\Feature;

use App\Models\Tag;
use App\Models\User;
use App\Models\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VideoTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_load_videos()
    {$this->withoutExceptionHandling();

        
        $videos = Video::factory(5)->create();

        $response = $this->get('api/videos');

        dd($response);
    }

    public function test_can_load_a_video()
    {$this->withoutExceptionHandling();
        $video = Video::factory()->create();

        $this->get("api/videos/{$video->id}")->assertStatus(200);
    }

    public function test_a_video_can_have_many_tags()
    {
        $this->withoutExceptionHandling();

        $tag = Tag::factory()->create();

        $tag->videos()->attach( Video::factory()->create() );

        $this->assertCount( 1, $tag->videos );
    }

    public function test_can_load_tags()
    {$this->withoutExceptionHandling();

        $tags = Tag::factory(5)->create();

        $this->get("api/tags")->assertStatus(200);

    }
}
