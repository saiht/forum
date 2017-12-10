<?php

namespace Tests\Unit;

use App\Reply;
use App\User;
use Tests\DatabaseMigrationsTestCase;

class ReplyTest extends DatabaseMigrationsTestCase
{

    /** @test */
    public function it_has_an_owner()
    {
        $reply = create(Reply::class);

        $this->assertInstanceOf(User::class, $reply->owner);
    }
}
