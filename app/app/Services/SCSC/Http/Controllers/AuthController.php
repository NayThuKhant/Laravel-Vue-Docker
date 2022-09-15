<?php

namespace App\Services\SCSC\Http\Controllers;

use App\Services\SCSC\Features\RegisterSCSCMemberFeature;
use App\Services\SCSC\Features\SendOTPToEmailFeature;
use Lucid\Units\Controller;

class AuthController extends Controller
{
    /**
     * Register account For SCSC Packages selling event
     *
     * @group SCSC
     * @unauthenticated
     *
     * @bodyParam name string required Name of the user
     * @bodyParam email string required Email of the user
     * @bodyParam email_otp string required OTP code for email of the user
     * @bodyParam country_code string required Country of the mobile number of the user
     * @bodyParam mobile_number string required Mobile number of the user
     * @bodyParam mobile_otp string required OTP code for mobile number of the user
     * @bodyParam password string required Password
     * @bodyParam password_confirmation string required Password confirmation
     */
    public function register()
    {
        // TODO add setting force verification on email & phone to application setting
        return $this->serve(RegisterSCSCMemberFeature::class);
    }

    /**
     * Send verification OTP to email
     *
     * @group SCSC
     * @unauthenticated
     *
     * @bodyParam email string required Email to receive OTP
     */
    public function sendOTPToEmail()
    {
        return $this->serve(SendOTPToEmailFeature::class);
    }
}
