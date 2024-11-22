<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class AttendanceType extends Enum
{
    const PRESENT = "PRESENT";
    const SICK = "SICK";
    const LEAVE = "LEAVE";
    const VACTION = "VACATION";
}
