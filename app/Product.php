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
            $products[$product->product_id][] = $product;
        }

        return $products;
    }

    private static function getTrainers()
    {
        return DB::select("SELECT * FROM laravel.product_category 
                                    WHERE laravel.product_category.product_id IN 
                                        (
                                            SELECT product_id FROM laravel.product_category 
                                            WHERE laravel.product_category.category = 'Trampki' 
                                        ) 
                                    ;");
    }
}
