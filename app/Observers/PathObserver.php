<?php

namespace App\Observers;

use App\Models\Programming\Path;

class PathObserver
{
    /**
     * Handle the Path "created" event.
     */
    public function created(Path $path): void
    {
        //
    }

    /**
     * Handle the Path "updated" event.
     */
    public function updated(Path $path): void
    {
        //
    }

    /**
     * Handle the Path "deleted" event.
     */
    public function deleted(Path $path): void
    {
        //
    }

    /**
     * Handle the Path "restored" event.
     */
    public function restored(Path $path): void
    {
        //
    }

    /**
     * Handle the Path "force deleted" event.
     */
    public function forceDeleted(Path $path): void
    {
        //
    }
}
