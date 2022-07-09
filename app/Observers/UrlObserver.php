<?php

namespace App\Observers;

use App\Jobs\CheckUrlJob;
use App\Models\Url;

class UrlObserver
{
    /**
     * Handle the Url "created" event.
     *
     * @param  Url  $url
     * @return void
     */
    public function created(Url $url): void
    {
        CheckUrlJob::dispatch($url)->delay(now()->addSeconds(10));
    }

}
