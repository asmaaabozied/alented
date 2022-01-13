<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsPDFSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads_p_d_f_s', function (Blueprint $table) {
            $table->id(); 
            $table->string('english_pdf');
            $table->string('arabic_pdf');
            $table->integer('view_count');
            $table->integer('download_count');
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
        Schema::dropIfExists('ads_p_d_f_s');
    }
}
