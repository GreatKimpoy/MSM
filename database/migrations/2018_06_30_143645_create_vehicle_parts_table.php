<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclePartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_parts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number');
            $table->integer('vehicle_id')->unsigned();
            $table->string('location');
            $table->string('description');
            $table->double('price', 8,2);
      
            $table->foreign('vehicle_id')
                ->references('id')
                ->on('vehicle_categories')
                ->onUpdate('cascade')
                ->onDelete('restrict');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicle_parts');
    }
}
