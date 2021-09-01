<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToShoppingCartsTable extends Migration
{
    public function up()
    {
        Schema::table('shopping_carts', function (Blueprint $table) {
            $table->uuid('customer_uuid_id')->nullable();
            $table->foreign('customer_uuid_id', 'customer_uuid_fk_4757282')->references('id')->on('customers');
            $table->uuid('product_uuid_id')->nullable();
            $table->foreign('product_uuid_id', 'product_uuid_fk_4757283')->references('id')->on('products');
        });
    }
}
