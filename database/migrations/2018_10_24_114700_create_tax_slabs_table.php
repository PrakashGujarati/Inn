<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaxSlabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tax_slabs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tax_id')->references('id')->on('users');
            $table->float("from");
            $table->float("to");
            $table->float("percentage");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tax_slabs');
    }
}
