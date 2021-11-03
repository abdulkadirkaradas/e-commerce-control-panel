<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToReviewsTable extends Migration
{
    public function up()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->uuid('attachment_id')->nullable();
            $table->foreign('attachment_id', 'attachment_fk_4766395')->references('id')->on('review_attachments');
        });
    }
}
