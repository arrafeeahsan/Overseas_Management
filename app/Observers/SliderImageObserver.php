<?php

namespace App\Observers;

use App\Models\SliderImage;
use Illuminate\Support\Facades\Auth;


class SliderImageObserver
{
    /**
     * Handle the SliderImage "created" event.
     *
     * @param  \App\Models\SliderImage  $sliderImage
     * @return void
     */
    public function creating(SliderImage $sliderImage)
    {
        $sliderImage->created_by = 'UserID- '.Auth::id();
    }

    /**
     * Handle the SliderImage "updated" event.
     *
     * @param  \App\Models\SliderImage  $sliderImage
     * @return void
     */
    public function updated(SliderImage $sliderImage)
    {
        //
    }

    /**
     * Handle the SliderImage "deleted" event.
     *
     * @param  \App\Models\SliderImage  $sliderImage
     * @return void
     */
    public function deleted(SliderImage $sliderImage)
    {
        //
    }

    /**
     * Handle the SliderImage "restored" event.
     *
     * @param  \App\Models\SliderImage  $sliderImage
     * @return void
     */
    public function restored(SliderImage $sliderImage)
    {
        //
    }

    /**
     * Handle the SliderImage "force deleted" event.
     *
     * @param  \App\Models\SliderImage  $sliderImage
     * @return void
     */
    public function forceDeleted(SliderImage $sliderImage)
    {
        //
    }
}
