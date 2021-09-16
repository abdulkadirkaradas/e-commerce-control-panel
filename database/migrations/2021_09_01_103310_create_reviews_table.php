<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('customer_id')->nullable();
            $table->string('product_id')->nullable();
            $table->string('rate_score')->nullable();
            $table->string('review')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
