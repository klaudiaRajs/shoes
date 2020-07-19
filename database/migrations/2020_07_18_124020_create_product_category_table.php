<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCategoryTable extends Migration
{
    public function up()
    {
        Schema::create('product_category', function (Blueprint $table) {
            $table->integer('product_id');
            $table->string('category');
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_category');
    }
}
