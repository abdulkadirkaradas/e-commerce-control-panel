<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsDetailsImagesTable extends Migration
{
    public function up()
    {
        Schema::create("products_details_images", function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->uuid("file_id")->nullable();
            $table->string("file_name")->nullable();
            $table->string("file_extension")->nullable();
            $table->string("file_url")->nullable();
            $table->string("image_url")->nullable();
            $table->string("picture_type")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
