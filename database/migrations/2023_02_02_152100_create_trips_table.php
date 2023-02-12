<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->string('name',255)->unique();
            $table->unsignedBigInteger('carrier_id');
            $table->unsignedBigInteger('schedule_id');
            $table->unsignedBigInteger('start_to_city_station_id');
            $table->unsignedBigInteger('end_to_city_station_id');
            $table->text('stoppages')->nullable();
            $table->text('day_off')->nullable();
            $table->boolean('active')->default(1);
            $table->timestamps();


            $table->foreign('carrier_id')->references('id')->on('carriers');
            $table->foreign('schedule_id')->references('id')->on('schedules');
            $table->foreign('start_to_city_station_id')->references('id')->on('city_stations');
            $table->foreign('end_to_city_station_id')->references('id')->on('city_stations');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trips');
    }
}
