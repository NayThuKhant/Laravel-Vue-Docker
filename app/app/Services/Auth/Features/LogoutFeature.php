<?php

namespace App\Services\Auth\Features;

use App\Domains\Auth\Jobs\LogoutJob;
use App\Helpers\JsonResponder;
use Lucid\Units\Feature;

class LogoutFeature extends Feature
{
    public function handle()
    {
        $this->dispatch(new LogoutJob());

        return JsonResponder::success('Logged out of all sessions successfully');
    }
}
