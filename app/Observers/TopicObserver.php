<?php

namespace App\Observers;

use App\Models\Topic;
use Illuminate\Support\Str;

class TopicObserver
{
    /**
     * Handle the Topic "creating" event.
     */
    public function creating(Topic $topic): void
    {
        if (auth()->check()) {
            $topic->slug = Str::slug($topic->title, '-');
            $topic->created_by = auth()->user()->id;
            $topic->updated_by = auth()->user()->id;
        }
    }

    /**
     * Handle the Topic "updating" event.
     */
    public function updating(Topic $topic): void
    {
        if (auth()->check()) {
            $topic->slug = Str::slug($topic->title, '-');
            $topic->updated_by = auth()->user()->id;
        }
    }

    /**
     * Handle the Topic "deleting" event.
     */
    public function deleting(Topic $topic): void
    {
        if (auth()->check()) {
            $topic->deleted_by = auth()->user()->id;
            $topic->is_published = false;
            $topic->save();
        }
    }

    /**
     * Handle the Topic "restoring" event.
     */
    public function restoring(Topic $topic): void
    {
        $topic->deleted_by = null;
        $topic->save();
    }
}
