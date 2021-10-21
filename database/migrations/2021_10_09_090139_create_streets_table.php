<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStreetsTable extends Migration
{
    public function up()
    {
        Schema::create('streets', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("name")->nullable();
            $table->uuid("quarter_id")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
