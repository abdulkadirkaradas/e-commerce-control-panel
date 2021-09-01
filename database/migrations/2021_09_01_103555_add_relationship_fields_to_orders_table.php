<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->uuid('products_uuid_id')->nullable();
            $table->foreign('products_uuid_id', 'products_uuid_fk_4757242')->references('id')->on('products');
            $table->uuid('customer_uuid_id')->nullable();
            $table->foreign('customer_uuid_id', 'customer_uuid_fk_4757243')->references('id')->on('customers');
            $table->uuid('address_uuid_id')->nullable();
            $table->foreign('address_uuid_id', 'address_uuid_fk_4757244')->references('id')->on('customer_addresses');
            $table->uuid('price_id')->nullable();
            $table->foreign('price_id', 'price_fk_4757276')->references('id')->on('products');
        });
    }
}
