<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ParticipateInForumTest extends TestCase
{

    use DatabaseMigrations;

    /** @test */
    function unauthenticated_users_may_not_add_replies()
    {
        // Given we have a unauthenticated user
        // When the user add a reply to the thread
        $this->withExceptionHandling()
            ->post('/threads/ahoy/1/replies', [])
            ->assertRedirect('/login');
    }

    /** @test */
    function an_authenticated_user_may_participate_in_forum_threads()
    {
        // Given we have a authenticated user
        $this->be($user = create('App\User'));

        // And an existing thread
        $thread = create('App\Thread');

        // When the user add a reply to the thread
        $reply = make('App\Reply');
        $this->post($thread->path().'/replies', $reply->toArray());

        // Then their reply should be visible on the page
        $this->get($thread->path())
                    ->assertSee($reply->body);
    }
}
