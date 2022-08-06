<?php

namespace App\Observers;

use App\Models\Post;
use App\Models\User;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     *
     * @param \App\Models\Post $post
     * @return void
     */
    public function created(Post $post)
    {
        $post->sub_title = 'Post created by' . auth()->user()->name . ' at ' . now();
        $post->save();
    }

    /**
     * Handle the Post "updated" event.
     *
     * @param \App\Models\Post $post
     * @return void
     */
    public function updated(Post $post)
    {
        $user = User::query()->find(auth()->user()->id);
        $user->name = 'Post updated by' . auth()->user()->name . ' at ' . now();
        $user->save();

    }

    /**
     * Handle the Post "deleted" event.
     *
     * @param \App\Models\Post $post
     * @return void
     */
    public function deleted(Post $post)
    {
        info('Post deleted by' . auth()->user()->name . ' at ' . now());

    }

    /**
     * Handle the Post "restored" event.
     *
     * @param \App\Models\Post $post
     * @return void
     */
    public function restored(Post $post)
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     *
     * @param \App\Models\Post $post
     * @return void
     */
    public function forceDeleted(Post $post)
    {
        //
    }
}
