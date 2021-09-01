<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProductsTable extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->uuid('category_uuid_id')->nullable();
            $table->foreign('category_uuid_id', 'category_uuid_fk_4756918')->references('id')->on('product_categories');
            $table->uuid('status_uuid_id')->nullable();
            $table->foreign('status_uuid_id', 'status_uuid_fk_4757341')->references('id')->on('product_statuses');
        });
    }
}
