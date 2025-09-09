<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Str;

class PostObserver
{
    /**
     * Handle the Post "creating" event.
     */
    public function creating(Post $post): void
    {
        if (auth()->check()) {
            $post->slug = Str::slug($post->title, '-');
            $post->created_by = auth()->user()->id;
            $post->updated_by = auth()->user()->id;
        }
    }

    /**
     * Handle the Post "updating" event.
     */
    public function updating(Post $post): void
    {
        if (auth()->check()) {
            $post->slug = Str::slug($post->title, '-');
            $post->updated_by = auth()->user()->id;
        }
    }

    /**
     * Handle the Post "deleting" event.
     */
    public function deleting(Post $post): void
    {
        if (auth()->check()) {
            $post->deleted_by = auth()->user()->id;
            $post->is_published = false;
            $post->save();
        }
    }

    /**
     * Handle the Post "restoring" event.
     */
    public function restoring(Post $post): void
    {
        $post->deleted_by = null;
    }
}
