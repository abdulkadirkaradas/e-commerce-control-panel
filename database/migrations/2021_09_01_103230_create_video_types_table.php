<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoTypesTable extends Migration
{
    public function up()
    {
        Schema::create('video_types', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('video_type')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
