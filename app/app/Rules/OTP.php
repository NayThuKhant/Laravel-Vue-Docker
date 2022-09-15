<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class OTP implements Rule
{
    public function __construct($recipient)
    {
        $this->recipient = $recipient;
    }

    public function passes($attribute, $value)
    {
        return (new \App\Helpers\OTP())->verify($this->recipient, $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Incorrect OTP';
    }
}
