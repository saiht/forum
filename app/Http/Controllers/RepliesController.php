<?php

namespace App\Http\Controllers;

use App\Thread;

/**
 * Class RepliesController
 * @package App\Http\Controllers
 */
class RepliesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param Thread $thread
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Thread $thread)
    {
        // @TODO add validator
        $thread->addReply([
            'body'    => request('body'),
            'user_id' => auth()->id(),
        ]);

        return back();
    }
}
