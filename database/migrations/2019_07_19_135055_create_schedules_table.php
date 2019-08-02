<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('operation_date');
            $table->string('high_discount')->nullable();
            $table->enum('status',['opened','finished'])->default('opened');
            $table->bigInteger('client_id')->unsigned();
            $table->bigInteger('worker_id')->unsigned()->nullable();
            $table->bigInteger('operation_id')->unsigned();
            $table->bigInteger('operation_discount_id')->unsigned();
            $table->bigInteger('operation_type_measure_id')->unsigned();

            $table->foreign('client_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('worker_id')->references('id')->on('workers')->onDelete('cascade');
            $table->foreign('operation_id')->references('id')->on('operations')->onDelete('cascade');
            $table->foreign('operation_discount_id')->references('id')->on('operation_discounts')->onDelete('cascade');
            $table->foreign('operation_type_measure_id')->references('id')->on('operation_type_measure')->onDelete('cascade');

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
        Schema::dropIfExists('schedules');
    }
}
