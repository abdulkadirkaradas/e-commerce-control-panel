<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerAddressTable extends Migration
{
    public function up()
    {
        Schema::create('customer_address', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('customer_id')->nullable();
            $table->string('province')->nullable();
            $table->string('district')->nullable();
            $table->string('quarter')->nullable();
            $table->string('street')->nullable();
            $table->longText('address')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
