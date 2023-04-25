<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldAllTitleAtSosmedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sosmeds', function (Blueprint $table) {
            $table->string('whatsapp_title');
            $table->string('shopee_title');
            $table->string('tokopedia_title');
            $table->string('instagram_title');
            $table->string('facebook_title');
            $table->string('twiter_title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sosmeds', function (Blueprint $table) {
            $table->dropColumn('whatsapp_title');
            $table->dropColumn('shopee_title');
            $table->dropColumn('tokopedia_title');
            $table->dropColumn('instagram_title');
            $table->dropColumn('facebook_title');
            $table->dropColumn('twiter_title');
        });
    }
}
