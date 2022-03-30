<?php

namespace App\Services;
use App\Models\Product;
use App\Models\Cart;

class CartService
{
    public static function getItemsInCart($items)
    {
        $products = []; //空の配列を準備

        foreach($items as $item)
        { 
            $p = Product::findOrFail($item->product_id);
            $owner = $p->shop->owner->select('name', 'email')->first()->toArray();//オーナー情報
            $values = array_values($owner); //連想配列の値を取得
            $keys = ['ownerName', 'email'];
            $ownerInfo = array_combine($keys, $values); // オーナー情報のキーを変更

            dd($ownerInfo);
        }
        return $products; // 新しい配列を返す
    }
}