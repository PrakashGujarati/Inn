<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLedgersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ledgers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->references('id')->on('users');
            $table->string('name',150);
            $table->string('alias',100);
            $table->string('opening',100);
            $table->string('connect_with',100);
            $table->integer('group_id')->references('id')->on('ledger_groups');
            $table->string('tally_name',100);
            $table->date('dob');
            $table->boolean('is_employee');
            $table->string('address');
            $table->string('city',80);
            $table->string('pincode',12);
            $table->string('phone_no',15);
            $table->string('mobile_no',15);
            $table->string('email',100);
            $table->float('discount',8,2);
            $table->string('native',100);
            $table->string('reference_name',100);
            $table->string('state',100);
            $table->string('nationality',100);
            $table->string('gstn_no',30);
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
        Schema::dropIfExists('ledgers');
    }
}
