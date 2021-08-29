<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPaymentTable extends Migration
{
    public function up()
    {
        Schema::create('user_payment', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->string('user_id', 36);
            $table->string('payment_type');
            $table->string('provider');
            $table->string('account_no');
            $table->string('expiry');

            $table->foreign('user_id')->references('uuid')->on('users');

            $table->timestamps();
            $table->softDeletes();
        });
    }

}
