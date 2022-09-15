<?php

namespace App\Enums;

enum REGXEnum: string
{
    case COUNTRY_CODE = "/^\+(?:[0-9]{1,3} ?)$/";
    case MOBILE_NUMBER = '/^[1-9]{1}+[0-9]{8,10}$/';
}
