<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCustomersTable extends Migration
{
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->uuid('address_id')->nullable();
            $table->foreign('address_id', 'address_fk_4757085')->references('id')->on('customer_address');
        });
    }
}
