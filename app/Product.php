<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    const NEW_PRODUCT = 'Nowość';
    const TRAINERS = 'Trampki';
    const OUTLET = 'Outlet';
    const SNEAKERS = 'Sneakers';

    public static function getTrainersWithCategories()
    {
        $trainers = self::getTrainers();

        $products = [];

        foreach ($trainers as $product) {
            $products[$product->product_id]['name'] = $product->name;
            $products[$product->product_id]['categories'][] = $product->category;
        }

        return $products;
    }

    private static function getTrainers()
    {
        return DB::select("SELECT product_id, category, name FROM product_category 
                                    INNER JOIN product ON product_category.product_id = product.id
                                    WHERE product_category.product_id IN 
                                        (
                                            SELECT product_id FROM product_category 
                                            WHERE product_category.category = 'Trampki' 
                                        ) 
                                    ;");
    }
}
