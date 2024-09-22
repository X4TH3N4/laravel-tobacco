<?php

namespace App\Observers;

use App\Models\Aroma;
use App\Models\Tobacco;

class TobaccoObserver
{
    /**
     * Handle the Tobacco "created" event.
     */
    public function created(Tobacco $tobacco): void
    {
        $brand = $tobacco->brand()->first()->name;
        dd($tobacco->aromas()->first()->id);
        $tobacco->name = $brand . ' 1';
        $tobacco->saveQuietly();
    }

    /**
     * Handle the Tobacco "updated" event.
     */
    public function updated(Tobacco $tobacco): void
    {
        //
    }

    /**
     * Handle the Tobacco "deleted" event.
     */
    public function deleted(Tobacco $tobacco): void
    {
        //
    }

    /**
     * Handle the Tobacco "restored" event.
     */
    public function restored(Tobacco $tobacco): void
    {
        //
    }

    /**
     * Handle the Tobacco "force deleted" event.
     */
    public function forceDeleted(Tobacco $tobacco): void
    {
        //
    }
}
