<?php


namespace App\Http\Controllers;


use App\Product;

class ProductController extends Controller
{
    public function getTrainersFromOutlet()
    {
        $trainers = Product::getTrainersWithCategories();
        $result = [];

        foreach ($trainers as $id => $details) {
            if ($this->isProductMatchingSearch($details)) {
                $result[$id] = $details;
            }
        }

        print_r($result);
    }

    private function isProductMatchingSearch(array $details)
    {
        $areTrainer = false;
        $isOutlet = false;
        foreach ($details['categories'] as $category) {
            if ($category == Product::TRAINERS) {
                $areTrainer = true;
            }
            if ($category == Product::OUTLET) {
                $isOutlet = true;
            }
        }
        return !$isOutlet && $areTrainer;
    }
}
