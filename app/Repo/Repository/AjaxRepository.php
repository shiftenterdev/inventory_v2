<?php

namespace app\Repo\Repository;

use App\Models\Customer;
use App\Models\Image;
use App\Repo\CoreTrait;
use Illuminate\Support\Facades\Session;

class AjaxRepository
{
    public function removeProduct($type, $id)
    {
        $session = Session::get($type);
        unset($session[$id]);
        Session::put($type, $session);
    }

    public function storeCustomer($input, $type)
    {
        unset($input['_token']);
        $input['customer_id'] = '';
        $customer = Customer::where('customer_phone', $input['customer_phone'])->first();
        if (!empty($customer)) {
            $input['customer_id'] = $customer->customer_id;
        }
        Session::put($type, $input);
    }

    public function productUpdate($code, $q, $type)
    {
        $new = [];
        if (Session::has($type)) {
            $current_list = Session::get($type);

            foreach ($current_list as $cl) {
                if ($cl['pro_code'] == $code) {
                    $cl['pro_quantity'] = $q;
                }
                $new[] = $cl;
            }
        }
        Session::put($type, $new);
    }

    public function productList($input, $type)
    {
        $true = false;
        $new = [];
        if (Session::has($type)) {
            $current_list = Session::get($type);

            foreach ($current_list as $cl) {
                if ($cl['pro_code'] == $input['pro_code']) {
                    $true = true;
                    ++$cl['pro_quantity'];
                }
                $new[] = $cl;
            }
        }
        if ($true == false) {
            $input['pro_title'] = CoreTrait::productTitleByCode($input['pro_code']);
            $input['pro_price'] = CoreTrait::productPriceByCode($input['pro_code']);
            $input['pro_quantity'] = 1;
            unset($input['_token']);
            Session::push($type, $input);
        } else {
            Session::put($type, $new);
        }
    }

    public function deleteImage($id)
    {
        $image = Image::where('id', $id)->pluck('img_title');
        if (file_exists(public_path('uploads/'.$image))) {
            unlink(public_path('uploads/'.$image));
        }
        Image::destroy($id);
    }
}
