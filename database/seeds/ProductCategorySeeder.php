<?php

use App\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategorySeeder extends Seeder
{


    public function run()
    {
        DB::table('product')->insert(
            [
                'name' => 'Buty Puma'
            ]
        );
        DB::table('product_category')->insert(
            [
                'product_id' => 1,
                'category' => Product::NEW_PRODUCT
            ]
        );
        DB::table('product_category')->insert(
            [
                'product_id' => 1,
                'category' => Product::SNEAKERS
            ]
        );
        DB::table('product')->insert(
            [
                'name' => 'Trampki Converse'
            ]
        );
        DB::table('product_category')->insert(
            [
                'product_id' => 2,
                'category' => Product::TRAINERS
            ]
        );
        DB::table('product_category')->insert(
            [
                'product_id' => 2,
                'category' => Product::NEW_PRODUCT
            ]
        );
        DB::table('product')->insert(
            [
                'name' => 'Trampki Vans'
            ]
        );
        DB::table('product_category')->insert(
            [
                'product_id' => 3,
                'category' => Product::TRAINERS
            ]
        );
        DB::table('product_category')->insert(
            [
                'product_id' => 3,
                'category' => Product::OUTLET
            ]
        );
        DB::table('product')->insert(
            [
                'name' => 'Buty Fila'
            ]
        );
        DB::table('product_category')->insert(
            [
                'product_id' => 4,
                'category' => Product::SNEAKERS
            ]
        );
        DB::table('product_category')->insert(
            [
                'product_id' => 4,
                'category' => Product::OUTLET
            ]
        );
    }
}
