<?php

namespace App\Enums;

use Illuminate\Validation\Rules\Password;

enum ValidatorEnum
{
    public static function PASSWORD_RULE(): array
    {
        return [
            'required', 'string', 'confirmed',
            //Password::min(8)->mixedCase()
        ];
    }
}
