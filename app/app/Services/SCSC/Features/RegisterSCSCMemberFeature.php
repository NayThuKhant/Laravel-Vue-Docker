<?php

namespace App\Services\SCSC\Features;

use App\Domains\SCSC\Jobs\RegisterSCSCMemberJob;
use App\Domains\SCSC\Requests\RegisterRequest;
use App\Helpers\JsonResponder;
use Lucid\Units\Feature;

class RegisterSCSCMemberFeature extends Feature
{
    public function handle(RegisterRequest $request)
    {
        $this->run(RegisterSCSCMemberJob::class, ["payload" => $request->only(['name', 'email', 'country_code', 'mobile_number', 'password'])]);

        return JsonResponder::success('Registered successfully');
    }
}
