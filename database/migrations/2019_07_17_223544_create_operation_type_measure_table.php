<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperationTypeMeasureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operation_type_measure', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order');
            $table->string('min');
            $table->string('max');
            $table->bigInteger('operation_type_id')->unsigned();
            $table->foreign('operation_type_id')->references('id')->on('operation_types')->onDelete('cascade');
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
        Schema::dropIfExists('operation_type_measure');
    }
}
