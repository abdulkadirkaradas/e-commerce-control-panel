<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTypeTable extends Migration
{
    public function up()
    {
        Schema::create('user_type', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->string('user_id', 36);
            $table->string('user_type', 36);

            $table->foreign('user_id')->references('uuid')->on('users');

            $table->timestamps();
            $table->softDeletes();
        });
    }
}
