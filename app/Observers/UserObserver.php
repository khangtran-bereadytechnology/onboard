<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "creating" event.
     */
    public function creating(User $user): void
    {
        if (auth()->check()) {
            $user->created_by = auth()->user()->id;
            $user->updated_by = auth()->user()->id;
        }
    }

    /**
     * Handle the User "updating" event.
     */
    public function updating(User $user): void
    {
        if (auth()->check()) {
            $user->updated_by = auth()->user()->id;
        }
    }

    /**
     * Handle the User "deleting" event.
     */
    public function deleting(User $user): void
    {
        if (auth()->check()) {
            $user->deleted_by = auth()->user()->id;
            $user->is_active = false;
            $user->save();
        }
    }
    /**
     * Handle the User "restoring" event.
     */
    public function restoring(User $user): void
    {
        $user->deleted_by = null;
        $user->save();
    }
}
