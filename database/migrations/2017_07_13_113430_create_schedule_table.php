<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('schedule', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('service_id')->unsigned()->nullable();
            $table->integer('week_number')->comment("0=sunday,1=monday,2=tuesday,3=wednesday,4=thursday,5=friday,6=saturday")->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->timestamps();
        });

        Schema::table('schedule', function(Blueprint $table) {
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('schedule');
    }

}
