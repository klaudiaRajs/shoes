<?php


namespace App\Http\Controllers;


use App\Product;

class ProductController extends Controller
{
    public function getTrainersFromOutlet()
    {
        $trainers = Product::getTrainersWithCategories();

        $result = [];

        foreach ($trainers as $id => $productCategories) {
            if ($this->isProductMatchingSearch($productCategories)) {
                $result[] = $id;
            }
        }

        print_r($result);
    }

    private function isProductMatchingSearch(array $productCategories)
    {
        $areTrainer = false;
        $isOutlet = false;
        foreach ($productCategories as $productCategory) {
            if ($productCategory->category == Product::TRAINERS) {
                $areTrainer = true;
            }
            if ($productCategory->category == Product::OUTLET) {
                $isOutlet = true;
            }
        }
        return !$isOutlet && $areTrainer;
    }
}
