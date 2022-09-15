<?php

namespace App\Domains\SCSC\Jobs;

use App\Enums\UserStatusEnum;
use App\Models\User;
use Carbon\Carbon;
use Lucid\Units\Job;

class RegisterSCSCMemberJob extends Job
{
    private array $payload;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($payload)
    {
        $this->payload = $payload;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $extras = [
            "email_verified_at" => Carbon::now(),
            "mobile_verified_at" => Carbon::now(),
            "status" => UserStatusEnum::VERIFIED->value,
        ];

        $this->payload = collect($this->payload)->merge($extras)->toArray();

        return User::create($this->payload);
    }
}
