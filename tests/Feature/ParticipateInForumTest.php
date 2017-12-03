<?php

namespace Tests\Feature;

use App\Thread;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ParticipateInForumTest extends TestCase
{

    use DatabaseMigrations;

    /** @var  Thread $thread */
    private $thread;

    public function setUp()
    {
        parent::setUp();

        $this->thread = factory('App\Thread')->create();
    }

    /** @test */
    public function an_authenticated_user_may_participate_in_forum_threads()
    {
        $user = factory(User::class)->create();
        $this->be($user); // used to authenticate user

        $reply = factory('App\Reply')->make();
        $this->post($this->thread->path() . '/replies', $reply->toArray());

        $this->get($this->thread->path())->assertSee($reply->body);
    }

    /** @test */
    public function an_unauthenticated_user_may_not_add_reply()
    {
        // see this Exception class by removing $this->be($user);
        // from an_authenticated_user_may_participate_in_forum_threads method
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $reply = factory('App\Reply')->make();
        $this->post($this->thread->path() . '/replies', $reply->toArray());
    }
}
