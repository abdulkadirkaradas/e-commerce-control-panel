<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerAddressesTable extends Migration
{
    public function up()
    {
        Schema::create('customer_address', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('customer_id')->nullable();
            $table->uuid('province_id')->nullable();
            $table->uuid('district_id')->nullable();
            $table->uuid('quarter_id')->nullable();
            $table->uuid('street_id')->nullable();
            $table->longText('address')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
