<?php

namespace App\Enums;

enum UserStatusEnum: string
{
    case PENDING = 'PENDING';
    case VERIFIED = 'VERIFIED';
    case DISABLED = 'DISABLED';
}
