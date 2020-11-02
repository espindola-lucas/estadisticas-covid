<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCovidStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('covid_statistics', function (Blueprint $table) {
            $table->id();
            $table->string('cases');
            $table->string('dead');
            $table->timestamps();
            $table->foreignId('user_id');
            $table->foreignId('city_id')
            ->references('id')->on('cities')
            ->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('covid_statistics');
    }
}
