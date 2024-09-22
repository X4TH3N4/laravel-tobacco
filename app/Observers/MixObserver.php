<?php

namespace App\Observers;

use App\Models\Mix;
use Illuminate\Support\Facades\Auth;

class MixObserver
{
    /**
     * Handle the Mix "created" event.
     */
    public function created(Mix $mix): void
    {
        $mix->owner_id = Auth::user()?->getAuthIdentifier();
        $mix->saveQuietly();
    }

    /**
     * Handle the Mix "updated" event.
     */
    public function updated(Mix $mix): void
    {
        //
    }

    /**
     * Handle the Mix "deleted" event.
     */
    public function deleted(Mix $mix): void
    {
        //
    }

    /**
     * Handle the Mix "restored" event.
     */
    public function restored(Mix $mix): void
    {
        //
    }

    /**
     * Handle the Mix "force deleted" event.
     */
    public function forceDeleted(Mix $mix): void
    {
        //
    }
}
