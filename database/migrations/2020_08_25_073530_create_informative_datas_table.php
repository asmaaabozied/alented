<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformativeDatasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informative_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->text('about_en');
            $table->text('about_ar');
            $table->text('our_mission_en');
            $table->text('our_mission_ar');
            $table->text('privecy_policy_en');
            $table->text('privecy_policy_ar');
            $table->string('contact_email');
            $table->string('phone_number');
            $table->string('facebook_link');
            $table->string('whatsapp_link');
            $table->string('twitter_link');
            $table->string('instgram_link');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('informative_datas');
    }
}
