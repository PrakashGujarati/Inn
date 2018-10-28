<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->references('id')->on('users');
            $table->string('short_name',150)->nullable();
            $table->string('tax_name',150)->nullable();
            $table->date('applies_from')->nullable();
            $table->integer('exempt_after')->nullable();
            $table->string('posting_type',150);
            $table->float('flat_amount',8,2)->nullable();
            $table->float('flat_percentage',8,2)->nullable();
            $table->integer('no_of_slab')->nullable();
            $table->string('apply_pax',150)->nullable();
            $table->string('apply_tax',150)->nullable();
            $table->boolean('is_on_rackrate')->nullable();
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
        Schema::dropIfExists('taxes');
    }
}
