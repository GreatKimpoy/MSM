<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('owner_id')->unsigned();
            $table->integer('vehicle_id')->unsigned();
            $table->string('plate_number')->nullable()->unique();
            $table->timestamps();


            $table->foreign('owner_id')
            ->references('id')
            ->on('persons')
            ->onUpdate('cascade')
            ->onDelete('restrict'); 

            $table->foreign('vehicle_id')
            ->references('id')
            ->on('vehicles')
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
        Schema::dropIfExists('vehicles');
    }
}
