<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProductDetailsTable extends Migration
{
    public function up()
    {
        Schema::table('product_details', function (Blueprint $table) {
            $table->uuid('product_id')->nullable();
            $table->foreign('product_id', 'product_id_fk_4766055')->references('id')->on('products');
        });
    }
}
