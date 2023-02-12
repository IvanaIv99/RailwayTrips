<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddArrivalDepartureToTripStoppagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trip_stoppages', function (Blueprint $table) {
            $table->time('departure')->after('crossover');
            $table->time('arrival')->after('departure');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trip_stoppages', function (Blueprint $table) {
            $table->dropColumn('arrival');
            $table->dropColumn('departure');

        });
    }
}
