<?php

namespace Tests\Feature;

use App\Reply;
use App\Thread;
use Tests\DatabaseMigrationsTestCase;

class ParticipateInForumTest extends DatabaseMigrationsTestCase
{

    /** @var  Thread $thread */
    private $thread;

    public function setUp()
    {
        parent::setUp();

        $this->thread = create('App\Thread');
    }

    /** @test */
    public function an_authenticated_user_may_participate_in_forum_threads()
    {
//        $user = create(User::class);
//        $this->be($user); // used to authenticate user

        // replaced by new helper method
        $this->signIn();

        $reply = make(Reply::class);
        $this->post($this->thread->path() . '/replies', $reply->toArray());

        $this
            ->get($this->thread->path())
            ->assertSee($reply->body);
    }

    /** @test */
    public function an_unauthenticated_user_may_not_add_reply()
    {
        // see this Exception class by removing $this->be($user);
        // from an_authenticated_user_may_participate_in_forum_threads method
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $reply = make(Reply::class);
        $this->post($this->thread->path() . '/replies', $reply->toArray());
    }
}
