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
final class Country extends Enum
{
    const Cameroon   = [ 'country_code' => 237, 'regex' => ''];
    const Ethiopia   = [ 'country_code' => 251, 'regex' => ''];
    const Morocco    = [ 'country_code' => 212, 'regex' => ''];
    const Mozambique = [ 'country_code' => 258, 'regex' => ''];
    const Uganda     = [ 'country_code' => 256, 'regex' => ''];
}
