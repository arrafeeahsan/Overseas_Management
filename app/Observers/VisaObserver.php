<?php

namespace App\Observers;

use Illuminate\Support\Facades\Auth;
use App\Models\Visa;

class VisaObserver
{
    /**
     * Handle the Visa "created" event.
     *
     * @param  \App\Models\Visa  $visa
     * @return void
     */
    public function creating(Visa $visa)
    {
        $visa->created_by = 'UserID- '.Auth::id();
    }

    /**
     * Handle the Visa "updated" event.
     *
     * @param  \App\Models\Visa  $visa
     * @return void
     */
    public function updated(Visa $visa)
    {
        //
    }

    /**
     * Handle the Visa "deleted" event.
     *
     * @param  \App\Models\Visa  $visa
     * @return void
     */
    public function deleted(Visa $visa)
    {
        //
    }

    /**
     * Handle the Visa "restored" event.
     *
     * @param  \App\Models\Visa  $visa
     * @return void
     */
    public function restored(Visa $visa)
    {
        //
    }

    /**
     * Handle the Visa "force deleted" event.
     *
     * @param  \App\Models\Visa  $visa
     * @return void
     */
    public function forceDeleted(Visa $visa)
    {
        //
    }
}
