<?php

namespace Tests\Feature;

use App\Thread;
use Tests\DatabaseMigrationsTestCase;

class CreateThreadTest extends DatabaseMigrationsTestCase
{

    /** @test */
    public function an_authenticated_user_can_create_a_thread()
    {
        $this->signIn();

        /** @var Thread $thread */
        $thread = make(Thread::class);
//        $thread = factory(Thread::class)->raw(); // create an array entity

        $this->post('/threads', $thread->toArray());

        $this->get($thread->path())
            ->assertSee($thread->title)
            ->assertSee($thread->body);
    }

    /** @test */
    public function guests_may_not_create_threads()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $thread = make(Thread::class);

        $this->post('/threads', $thread->toArray());
    }
}
