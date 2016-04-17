<?php

namespace App\Repo\Repository;


use App\Models\Product;
use App\Models\Sell;
use App\Repo\CoreTrait;

class MainRepository
{
    public function getTopSells()
    {
        $sells = Sell::with('products','customer')->limit(4)->orderBy('id','desc')->get();
        foreach ($sells as $key => $s) {
            $amount = 0;
            foreach($s->products as $p){
                $amount += floatval($p->pro_quantity)*floatval($p->pro_price);
            }
            $s->amount = $amount;
        }
        return $sells;
    }

    public function getProductWithImage()
    {
        $products = Product::all();
        foreach($products as $p){
            $p->image = CoreTrait::imageById($p->pro_image_id);
        }
        return $products;
    }
}