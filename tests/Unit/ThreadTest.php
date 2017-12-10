<?php

namespace Tests\Unit;

use App\Thread;
use App\User;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tests\DatabaseMigrationsTestCase;

/**
 * Class ThreadTest
 * @package Tests\Unit
 */
class ThreadTest extends DatabaseMigrationsTestCase
{

    /** @var  Thread $thread */
    private $thread;

    public function setUp()
    {
        parent::setUp();

        // if make method used instead of create, id will be 'null'
        $this->thread = create(Thread::class);
    }

    /** @test */
    public function a_thread_has_replies()
    {
        // make method doesn't connect with database, but same result as create method

        $this->assertInstanceOf(HasMany::class, $this->thread->replies());
    }

    /** @test */
    public function a_thread_has_a_creator()
    {
        $relatedUser = $this->thread->creator()->getRelated();

        $this->assertInstanceOf(User::class, $relatedUser);
    }

    /** @test */
    public function a_thread_can_add_a_reply()
    {
        $this->thread->addReply([
            'body'      => 'foobar',
            'user_id'   => 1,
            'thread_id' => $this->thread->id,
        ]);

        $this->assertCount(1, $this->thread->replies()->get());
    }
}
