<?php

namespace App\Repo;


use App\Models\Customer;

trait CoreTrait
{
    public static function customerId()
    {
        $customer_id = Customer::orderBy('id','desc')->pluck('customer_id');
        if(empty($customer_id)){
            $customer_id = 1000001;
        }else{
            $customer_id = $customer_id +1;
        }
        return $customer_id;
    }
}