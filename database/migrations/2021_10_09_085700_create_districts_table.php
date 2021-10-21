<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistrictsTable extends Migration
{
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("name")->nullable();
            $table->uuid("province_id")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
