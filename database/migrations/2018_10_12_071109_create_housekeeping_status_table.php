<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHousekeepingStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('housekeeping_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->references('id')->on('users');
            $table->string('status',100)->nullable();
            $table->string('color',100)->nullable();
            $table->string('is_dirty',20)->nullable();
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
        Schema::dropIfExists('housekeeping_status');
    }
}
