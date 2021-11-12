<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSubProductCategoriesTable extends Migration
{
    public function up()
    {
        Schema::table('sub_product_categories', function (Blueprint $table) {
            $table->uuid("product_category_id")->nullable();
            $table->foreign('product_category_id', 'product_category_fk_6524276')->references('id')->on('product_categories');
        });
    }
}
