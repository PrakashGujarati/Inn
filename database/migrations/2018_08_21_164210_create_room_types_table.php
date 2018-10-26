<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_types', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->references('id')->on('users');
            $table->string('name');
            $table->string('short_name');
            $table->float('person_one',8,2)->nullable();
            $table->float('person_two',8,2)->nullable();
            $table->float('person_three',8,2)->nullable();
            $table->float('person_four',8,2)->nullable();
            $table->float('person_five',8,2)->nullable();
            $table->float('extra_person',8,2)->nullable();
            $table->float('person_one_nac',8,2)->nullable();
            $table->float('person_two_nac',8,2)->nullable();
            $table->float('person_three_nac',8,2)->nullable();
            $table->float('person_four_nac',8,2)->nullable();
            $table->float('person_five_nac',8,2)->nullable();
            $table->float('extra_person_nac',8,2)->nullable();
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
        Schema::dropIfExists('room_types');
    }
}
