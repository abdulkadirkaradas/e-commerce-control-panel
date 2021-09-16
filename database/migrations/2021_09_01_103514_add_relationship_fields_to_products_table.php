<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProductsTable extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->uuid('category_id')->nullable();
            $table->foreign('category_id', 'category_id_fk_4756918')->references('id')->on('product_categories');
            $table->uuid('status_id')->nullable();
            $table->foreign('status_id', 'status_id_fk_4757341')->references('id')->on('product_statuses');
        });
    }
}
