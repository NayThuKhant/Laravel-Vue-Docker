<?php

namespace App\Domains\SCSC\Jobs;

use App\Helpers\OTP;
use Lucid\Units\Job;

class GenerateAndSendOTPJob extends Job
{
    private string $channel;

    private string $recipient;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($channel, $recipient)
    {
        $this->channel = $channel;
        $this->recipient = $recipient;
    }

    /**
     * Execute the job.
     *
     * @return void
     *
     * @throws \Exception
     */
    public function handle()
    {
        $this->validateChannel();
        (new OTP)->generateForRecipient($this->recipient)->sendViaEmail();
    }

    /**
     * @throws \Exception
     */
    private function validateChannel()
    {
        if (! collect(['email', 'sms'])->contains($this->channel)) {
            $class = get_class($this);
            throw new \Exception("Channel $this->channel is not available in $class");
        }
    }
}
