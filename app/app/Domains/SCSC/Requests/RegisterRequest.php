<?php

namespace App\Domains\SCSC\Requests;

use App\Enums\REGXEnum;
use App\Enums\ValidatorEnum;
use App\Rules\OTP;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $countryCodeRegx = REGXEnum::COUNTRY_CODE->value;
        $mobileNumberRegx = REGXEnum::MOBILE_NUMBER->value;

        return [
            "name" => "required|string|max:255",
            "email" => "required|email|unique:users",
            "email_otp" => ["required", "numeric", new OTP(request()->email)],
            "country_code" => "required|string|regex:$countryCodeRegx",
            "mobile_number" => "required|string|unique:users|regex:$mobileNumberRegx",
            "mobile_otp" => "required|numeric",
            "password" => ValidatorEnum::PASSWORD_RULE(),
        ];
    }
}
