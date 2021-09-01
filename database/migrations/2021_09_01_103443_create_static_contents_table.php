<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaticContentsTable extends Migration
{
    public function up()
    {
        Schema::create('static_contents', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('key')->nullable();
            $table->string('title')->nullable();
            $table->longText('html_content')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
