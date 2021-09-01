<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToFaqsTable extends Migration
{
    public function up()
    {
        Schema::table('faqs', function (Blueprint $table) {
            $table->uuid('category_id')->nullable();
            $table->foreign('category_id', 'category_fk_4766673')->references('id')->on('faq_categories');
        });
    }
}
