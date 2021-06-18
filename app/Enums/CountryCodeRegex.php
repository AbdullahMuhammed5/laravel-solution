<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Cameroon()
 * @method static static Ethiopia()
 * @method static static Morocco()
 * @method static static Mozambique()
 * @method static static Uganda()
 */
final class CountryCodeRegex extends Enum
{
    const Cameroon   = '/\(237\)[\ ][2368]\d{7,8}$/';
    const Ethiopia   = '/\(251\)[\ ][1-59]\d{8}$/';
    const Morocco    = '/\(212\)[\ ][5-9]\d{8}$/';
    const Mozambique = '/\(258\)[\ ][28]\d{7,8}$/';
    const Uganda     = '/\(256\)[\ ]\d{9}$/';
}
