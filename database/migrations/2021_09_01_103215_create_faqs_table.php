<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqsTable extends Migration
{
    public function up()
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('question')->nullable();
            $table->string('answer')->nullable();
            $table->string('sorting')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
