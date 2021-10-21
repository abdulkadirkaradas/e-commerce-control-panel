<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuartersTable extends Migration
{
    public function up()
    {
        Schema::create('quarters', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("name")->nullable();
            $table->uuid("district_id")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
