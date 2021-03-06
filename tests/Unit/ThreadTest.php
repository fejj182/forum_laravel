<?php

namespace Tests\Unit;

use Tests\DBTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ThreadTest extends DBTestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->thread = create('App\Thread');
    }

    /** @test */
    public function it_has_a_channel_within_the_path()
    {
        $this->assertContains("/threads/{$this->thread->channel->slug}/{$this->thread->id}", $this->thread->path());
    }


    /** @test */
    public function it_has_a_creator()
    {
        $this->assertInstanceOf('App\User', $this->thread->creator);
    }

    /** @test */
    public function it_has_replies()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->thread->replies);
    }

    /** @test */
    public function it_can_add_a_reply()
    {
        $reply = create('App\Reply');
        $this->thread->addReply([
            'body' => $reply->body,
            'user_id' => $reply->user_id
        ]);

        $this->assertCount(1, $this->thread->replies);
    }

    /** @test */
    public function it_belongs_to_a_channel()
    {
        $this->assertInstanceOf('App\Channel', $this->thread->channel);
    }


}
