<?php

namespace App\Domains\Auth\Jobs;

use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Token;
use Lucid\Units\Job;

class LogoutOfAllSessionsJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        return Token::where('user_id', Auth::id())->update(['revoked' => true]);
    }
}
