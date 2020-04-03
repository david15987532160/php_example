<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OUT_OF_ORDER
 * @method static static STOCKING
 * @method static static UPCOMING_STOCK
 */
final class ItemStatus extends Enum
{
    const OUT_OF_ORDER = 1;
    const STOCKING = 2;
    const UPCOMING_STOCK = 3;
}
