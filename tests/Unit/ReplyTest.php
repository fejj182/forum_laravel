<?php

namespace Tests\Unit;

use Tests\DBTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ReplyTest extends DBTestCase
{
    /** @test */
    public function it_has_an_owner()
    {
        $reply = create('App\Reply');

        $this->assertInstanceOf('App\User', $reply->owner);
    }
}
