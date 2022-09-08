<?php

namespace App\Observers;

use App\Models\Partner;

class PartnerObserver
{
    /**
     * Handle the Partner "created" event.
     *
     * @param  \App\Models\Partner  $partner
     * @return void
     */
    public function created(Partner $partner)
    {
        //
    }

    /**
     * Handle the Partner "updated" event.
     *
     * @param  \App\Models\Partner  $partner
     * @return void
     */
    public function updated(Partner $partner)
    {
        //
    }

    /**
     * Handle the Partner "deleted" event.
     *
     * @param  \App\Models\Partner  $partner
     * @return void
     */
    public function deleted(Partner $partner)
    {
        //
    }

    /**
     * Handle the Partner "restored" event.
     *
     * @param  \App\Models\Partner  $partner
     * @return void
     */
    public function restored(Partner $partner)
    {
        //
    }

    /**
     * Handle the Partner "force deleted" event.
     *
     * @param  \App\Models\Partner  $partner
     * @return void
     */
    public function forceDeleted(Partner $partner)
    {
        //
    }
}
