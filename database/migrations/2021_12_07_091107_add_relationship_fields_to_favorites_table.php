<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToFavoritesTable extends Migration
{
    public function up()
    {
        Schema::table('favorites', function (Blueprint $table) {
            $table->uuid('customer_id')->nullable();
            $table->foreign('customer_id', 'customer_id_fk_4819365')->references('id')->on('customers');
            $table->uuid('product_id')->nullable();
            $table->foreign('product_id', 'product_id_fk_4819366')->references('id')->on('products');
        });
    }
}
