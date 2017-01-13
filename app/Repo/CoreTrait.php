<?php

namespace app\Repo;

use App\Models\Customer;
use App\Models\Image;
use App\Models\Category;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Sell;

trait CoreTrait
{
    public static function customerId()
    {
        $customer_id = Customer::orderBy('id', 'desc')->pluck('customer_id');
        if (empty($customer_id)) {
            $customer_id = 1000001;
        } else {
            $customer_id = $customer_id + 1;
        }

        return $customer_id;
    }

    public static function imageById($id)
    {
        $name = Image::where('id', $id)->pluck('img_title');

        return $name;
    }

    public static function catById($id)
    {
        $cat_name = Category::where('id', $id)->pluck('cat_title');

        return $cat_name;
    }

    public static function productCode()
    {
        $product_code = Product::orderBy('id', 'desc')->pluck('pro_code');
        if (empty($product_code)) {
            $product_code = 'P1000001';
        } else {
            $product_code = str_replace('P', '', $product_code);
            $product_code = 'P'.(intval($product_code) + 1);
        }

        return $product_code;
    }

    public static function productTitleByCode($id)
    {
        $title = Product::where('pro_code', $id)->pluck('pro_title');

        return $title;
    }

    public static function productPriceByCode($id)
    {
        $price = Product::where('pro_code', $id)->pluck('pro_price');

        return $price;
    }

    public static function SellInvoiceId()
    {
        $invoice_id = Invoice::where('is_locked',0)
            ->orderBy('id', 'desc')->where('type','sell')->pluck('invoice_no');
        if (empty($invoice_id)) {
            $new = Invoice::orderBy('id','desc')->where('type','sell')
                ->pluck('invoice_no');
            if(empty($new)){
                return 600000;
            }
            return $new+1;
        }

        return $invoice_id;
    }

    public static function PurchaseInvoiceId()
    {
        $invoice_id = Invoice::where('is_locked',0)
            ->orderBy('id', 'desc')->where('type','purchase')->pluck('invoice_no');
        if (empty($invoice_id)) {
            $new = Invoice::orderBy('id','desc')
                ->where('type','purchase')
                ->pluck('invoice_no');
            if(empty($new)){
                return 800000;
            }
            return $new+1;
        }

        return $invoice_id;
    }
}
