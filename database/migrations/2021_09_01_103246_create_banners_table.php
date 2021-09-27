<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('key')->nullable();
            $table->string('link_url')->nullable();
            $table->uuid('file_id')->nullable();
            $table->string('file_name')->nullable();
            $table->string('file_extension')->nullable();
            $table->string('file_url')->nullable();
            $table->string('image_url')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
