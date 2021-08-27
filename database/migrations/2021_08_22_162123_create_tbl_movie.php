<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblMovie extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_movie', function (Blueprint $table) {
            $table->increments('movie_id');
            $table->string('movie_name');
            $table->string('movie_keywords');
            $table->string('movie_seodes');
            $table->string('movie_seokey');
            $table->integer('movie_total_episode');
            $table->string('movie_name_en');
            $table->string('movie_slug');
            $table->string('movie_trailer');
            $table->string('movie_image');
            $table->text('movie_content');
            $table->text('movie_desc');
            $table->string('movie_trangthai');
            $table->string('movie_year');
            $table->timestamp('movie_date');
            $table->integer('movie_time');
            $table->string('movie_quality');
            $table->string('movie_language');
            $table->integer('option_id');
            $table->integer('eposide_id')->unsigned();
            $table->foreign('eposide_id')
                  ->references('eposide_id')
                  ->on('tbl_eposide')
                  ->onDelete('cascade');
            $table->string('country_id');
            $table->string('movie_view');
            $table->integer('movie_hot');
            $table->integer('movie_status');
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
        Schema::dropIfExists('tbl_movie');
    }
}
