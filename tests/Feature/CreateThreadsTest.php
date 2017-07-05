<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateThreadsTest extends TestCase
{

    use DatabaseMigrations;

    /** @test */
    function guests_may_not_create_threads()
    {
        //Get the exception
        $this->withExceptionHandling();

        // If hit the create threads url route.
        // And is not logged in.
        // So redirect to the login page.
        $this->get('/threads/create')
            ->assertRedirect('/login');

        // If hit the create post url route.
        // And is not logged in.
        // So redirect to the login page.
        $this->post('/threads')
            ->assertRedirect('/login');
    }


    /** @test */
    function an_authenticated_user_can_create_new_forum_threads()
    {
        // Given we have a signed in user
        $this->signIn();

        // When we hit the endpoint to create a new thread
        $thread = create('App\Thread');

        $this->post('/threads', $thread->toArray());

        // Them, when we visit the thread page
        // We should see the new thread
        $this->get($thread->path())
            ->assertSee($thread->title)
                ->assertSee($thread->body);
    }

}
