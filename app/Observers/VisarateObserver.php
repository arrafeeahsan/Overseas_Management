<?php

namespace App\Observers;

use Illuminate\Support\Facades\Auth;
use App\Models\Visarate;

class VisarateObserver
{
    /**
     * Handle the Visarate "created" event.
     *
     * @param  \App\Models\Visarate  $visarate
     * @return void
     */
    public function creating(Visarate $visarate)
    {
        $visarate->created_by = 'UserID- '.Auth::id();
    }

    /**
     * Handle the Visarate "updated" event.
     *
     * @param  \App\Models\Visarate  $visarate
     * @return void
     */
    public function updated(Visarate $visarate)
    {
        //
    }

    /**
     * Handle the Visarate "deleted" event.
     *
     * @param  \App\Models\Visarate  $visarate
     * @return void
     */
    public function deleted(Visarate $visarate)
    {
        //
    }

    /**
     * Handle the Visarate "restored" event.
     *
     * @param  \App\Models\Visarate  $visarate
     * @return void
     */
    public function restored(Visarate $visarate)
    {
        //
    }

    /**
     * Handle the Visarate "force deleted" event.
     *
     * @param  \App\Models\Visarate  $visarate
     * @return void
     */
    public function forceDeleted(Visarate $visarate)
    {
        //
    }
}
