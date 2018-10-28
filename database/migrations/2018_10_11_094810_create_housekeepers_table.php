<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHousekeepersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_keepers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->references('id')->on('users');
            $table->string('name',150)->nullable();
            $table->string('mobile_no',150)->nullable();
            $table->string('user_name',150)->nullable();
            $table->string('password',150)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('housekeepers');
    }
}
