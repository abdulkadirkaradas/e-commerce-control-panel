<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubProductCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('sub_product_categories', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('catgory_name');
            $table->string('sorting')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
