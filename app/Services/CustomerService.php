<?php


namespace App\Services;


use App\Models\Customer;

class CustomerService
{
    public function handleFilters($filters)
    {
        $customers = Customer::all();
        foreach ($filters as $key => $value){
            if (isset($value)) { // if filter has value( Not Null)
                $customers = $customers->filter(function ($item) use ($key, $value){
                    // using $key because filter keys and model attributes has the same name
                    return $item->$key == $value;
                });
            }
        }
        return $customers;
    }
}
