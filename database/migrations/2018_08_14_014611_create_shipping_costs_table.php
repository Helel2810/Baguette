<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_costs', function (Blueprint $table) {
            $table->increments('id');
            $table->float('price');
            $table->unsignedInteger('shipping_method_id');
            $table->foreign('shipping_method_id')->references('id')->on('shipping_methods');
            $table->unsignedInteger('kabupaten_id');
            $table->foreign('kabupaten_id')->references('id')->on('kabupatens');
            $table->unsignedInteger('kecamatan_id');
            $table->foreign('kecamatan_id')->references('id')->on('kecamatans');
            $table->unsignedInteger('provinsi_id');
            $table->foreign('provinsi_id')->references('id')->on('provinsis');
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
        Schema::dropIfExists('shipping_costs');
    }
}
