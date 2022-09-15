<?php

namespace App\Services\Auth\Features;

use App\Domains\Auth\Jobs\LoginJob;
use App\Domains\Auth\Requests\LoginRequest;
use App\Helpers\JsonResponder;
use Lucid\Units\Feature;

class LoginFeature extends Feature
{
    public function handle(LoginRequest $request)
    {
        $response = $this->run(LoginJob::class, ['identifier' => $request->identifier, 'password' => $request->password]);

        return JsonResponder::success('Logged in successfully', $response);
    }
}
