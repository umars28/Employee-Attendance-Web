<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class RoleType extends Enum
{
    const ADMIN = "ADMIN";
    const EMPLOYEE = "EMPLOYEE";
}
