<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->uuid('products_id')->nullable();
            $table->foreign('products_id', 'products_id_fk_4757242')->references('id')->on('products');
            $table->uuid('customer_id')->nullable();
            $table->foreign('customer_id', 'customer_id_fk_4757243')->references('id')->on('customers');
            $table->uuid('address_id')->nullable();
            $table->foreign('address_id', 'address_id_fk_4757244')->references('id')->on('customer_addresses');
            $table->uuid('price')->nullable();
            $table->foreign('price', 'price_fk_4757276')->references('id')->on('products');
        });
    }
}
