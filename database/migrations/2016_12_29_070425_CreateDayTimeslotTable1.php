<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDayTimeslotTable1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('day_timeslot', function (Blueprint $table) {
             $table->increments('id')->primary;
            $table->integer('day_id')->unsigned();
            $table->foreign('day_id')->references('id')->on('days');
            $table->integer('timeslot_id')->unsigned();
            $table->foreign('timeslot_id')->references('id')->on('timeslots');
            $table->timestampTz('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestampTz('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->softDeletes('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
