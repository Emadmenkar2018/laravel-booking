<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaypalSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paypal_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->text('client_id_sandbox');
            $table->text('secret_sandbox');
            $table->text('client_id_live');
            $table->text('secret_live');
            $table->string('mode',10);
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
        Schema::dropIfExists('paypal_settings');
    }
}
