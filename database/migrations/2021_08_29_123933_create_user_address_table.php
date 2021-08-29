<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAddressTable extends Migration
{
    public function up()
    {
        Schema::create('user_address', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->string('user_id', 36);
            $table->string('province');
            $table->string('district');
            $table->string('quarter');
            $table->string('street');
            $table->string('address');

            $table->foreign('user_id')->references('uuid')->on('users');

            $table->timestamps();
            $table->softDeletes();
        });
    }
}
