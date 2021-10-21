<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvincesTable extends Migration
{
    public function up()
    {
        Schema::create('provinces', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("name")->nullable();
            $table->string("zip_code")->nullable();
            $table->string("plate_code")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
