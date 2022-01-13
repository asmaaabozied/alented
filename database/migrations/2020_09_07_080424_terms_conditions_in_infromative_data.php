<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TermsConditionsInInfromativeData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('informative_datas', function (Blueprint $table) {
            $table->text('terms_conditions_en');
            $table->text('terms_conditions_ar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('informative_datas', function (Blueprint $table) {
            $table->text('terms_conditions_en');
            $table->text('terms_conditions_ar');
        });
    }
}
