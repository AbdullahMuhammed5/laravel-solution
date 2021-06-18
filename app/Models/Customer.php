<?php

namespace App\Models;

use App\Enums\CountryCodeRegex;
use App\Enums\CountryCodes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';

    protected $appends = ['country', 'country_code', 'phone_state'];

    public function getPhoneAttribute($value)
    {
        return explode(' ', $value)[1];
    }

    public function getCountryCodeAttribute()
    {
        $code = explode(' ', $this->attributes['phone'])[0];
        return preg_replace('~[)(]~', '',  $code);
    }

    public function getCountryAttribute()
    {
        return CountryCodes::getDescription((int) $this->countryCode);
    }

    public function getPhoneStateAttribute()
    {
        return (int) preg_match(
            CountryCodeRegex::getValue($this->country), $this->attributes['phone']
        );
    }
}
