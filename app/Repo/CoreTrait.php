<?php

namespace App\Repo;


use App\Models\Customer;
use App\Models\Image;
use App\Models\Category;
use App\Models\Product;
use App\Models\Sell;


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

    public static function imageById($id)
    {
        $name = Image::where('id',$id)->pluck('img_title');
        return $name;
    }

    public static function catById($id)
    {
        $cat_name = Category::where('id',$id)->pluck('cat_title');
        return $cat_name;        
    }

    public static function productCode()
    {
        $product_code = Product::orderBy('id','desc')->pluck('pro_code');
        if(empty($product_code)){
            $product_code = 'P1000001';
        }else{
            $product_code = str_replace('P', '', $product_code);
            $product_code = 'P'.(intval($product_code)+1);
        }
        return $product_code;

    }

    public static function productTitleByCode($id)
    {
        $title = Product::where('pro_code',$id)->pluck('pro_title');
        return $title;
    }

    public static function productPriceByCode($id)
    {
        $price = Product::where('pro_code',$id)->pluck('pro_price');
        return $price;
    }

    public static function SellInvoiceId()
    {
        $invoice_id = Sell::orderBy('id','desc')->pluck('invoice_id');
        if(empty($invoice_id)){
            $invoice_id = 'IS-1000001';
        }else{
            $invoice_id = str_replace('IS-', '', $invoice_id);
            $invoice_id = 'IS-'.($invoice_id +1);
        }
        return $invoice_id;
    }

    public static function PurchaseInvoiceId()
    {
        $invoice_id = Purchase::orderBy('id','desc')->pluck('invoice_id');
        if(empty($invoice_id)){
            $invoice_id = 'IP-1000001';
        }else{
            $invoice_id = str_replace('IP-', '', $invoice_id);
            $invoice_id = 'IP-'.($invoice_id +1);
        }
        return $invoice_id;
    }
}
