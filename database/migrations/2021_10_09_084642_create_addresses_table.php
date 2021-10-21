<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->uuid("province_id")->nullable();
            $table->uuid("district_id")->nullable();
            $table->uuid("quarter_id")->nullable();
            $table->uuid("street_id")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
