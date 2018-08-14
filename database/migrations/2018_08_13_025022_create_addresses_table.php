<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('address');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('provinsi_id');
            $table->foreign('provinsi_id')->references('id')->on('provinsis');
            $table->unsignedInteger('kabupaten_id');
            $table->foreign('kabupaten_id')->references('id')->on('kabupatens');
            $table->unsignedInteger('kecamatan_id');
            $table->foreign('kecamatan_id')->references('id')->on('kecamatans');
            $table->unsignedInteger('kodepos_id');
            $table->foreign('kodepos_id')->references('id')->on('pos_codes');
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
        Schema::dropIfExists('addresses');
    }
}
