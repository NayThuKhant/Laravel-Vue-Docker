<?php

namespace App\Services\SCSC\Features;

use App\Domains\SCSC\Jobs\GenerateAndSendOTPJob;
use App\Domains\SCSC\Requests\SendOTPToEmailRequest;
use App\Helpers\JsonResponder;
use Lucid\Units\Feature;

class SendOTPToEmailFeature extends Feature
{
    public function handle(SendOTPToEmailRequest $request)
    {
        $this->run(GenerateAndSendOTPJob::class, ['channel' => 'email', 'recipient' => $request->email]);

        return JsonResponder::success('OTP has been sent successfully');
    }
}
