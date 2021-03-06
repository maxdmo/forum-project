<?php

namespace App\Http\Controllers;

use App\Thread;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    /**
     *  Persist a new reply.
     *
     *  @param Thread $thread
     *  @return \Illuminate\Http\RedirectResponse
     */
    public function store($channel_id, Thread $thread)
    {
       $thread->addReply([
           'body' => request('body'),
           'user_id' => auth()->id()
       ]);

       return back();
    }
}
