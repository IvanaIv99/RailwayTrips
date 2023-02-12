<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripStoppagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip_stoppages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trip_id');
            $table->unsignedBigInteger('start_city_station_id');
            $table->unsignedBigInteger('end_city_station_id');
            $table->string('distance',255)->nullable();
            $table->string('time',255)->nullable();
            $table->tinyInteger('crossover')->default(0);
            $table->boolean('active')->default(1);
            $table->timestamps();


            $table->foreign('start_city_station_id')->references('id')->on('city_stations');
            $table->foreign('end_city_station_id')->references('id')->on('city_stations');

            $table->foreign('trip_id')->references('id')->on('trips');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trip_stoppages');
    }
}
