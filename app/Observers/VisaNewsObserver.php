<?php

namespace App\Observers;

use App\Models\VisaNews;
use Illuminate\Support\Facades\Auth;


class VisaNewsObserver
{
    /**
     * Handle the VisaNews "created" event.
     *
     * @param  \App\Models\VisaNews  $visaNews
     * @return void
     */
    public function creating(VisaNews $visaNews)
    {
        $visaNews->created_by = 'UserID- '.Auth::id();
        
    }

    /**
     * Handle the VisaNews "updated" event.
     *
     * @param  \App\Models\VisaNews  $visaNews
     * @return void
     */
    public function updated(VisaNews $visaNews)
    {
        //
    }

    /**
     * Handle the VisaNews "deleted" event.
     *
     * @param  \App\Models\VisaNews  $visaNews
     * @return void
     */
    public function deleted(VisaNews $visaNews)
    {
        //
    }

    /**
     * Handle the VisaNews "restored" event.
     *
     * @param  \App\Models\VisaNews  $visaNews
     * @return void
     */
    public function restored(VisaNews $visaNews)
    {
        //
    }

    /**
     * Handle the VisaNews "force deleted" event.
     *
     * @param  \App\Models\VisaNews  $visaNews
     * @return void
     */
    public function forceDeleted(VisaNews $visaNews)
    {
        //
    }
}
