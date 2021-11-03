<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToVideosTable extends Migration
{
    public function up()
    {
        Schema::table('videos', function (Blueprint $table) {
            $table->uuid('type_id')->nullable();
            $table->foreign('type_id', 'type_fk_4975657')->references('id')->on('video_types');
        });
    }
}
