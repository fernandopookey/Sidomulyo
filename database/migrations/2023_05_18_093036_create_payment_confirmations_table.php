<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentConfirmationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_confirmations', function (Blueprint $table) {
            $table->id();
            $table->integer('transaction_id');
            $table->integer('user_id');
            $table->string('name');
            $table->string('bank');
            $table->integer('account_number');
            $table->string('account_name');
            $table->string('photos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_confirmations');
    }
}