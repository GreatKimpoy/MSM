<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInspectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspections', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('person_id')->unsigned();
            $table->integer('vehicle_person_id')->unsigned();
            $table->integer('appointment_id')->unsigned();
            $table->date('date_received');
            $table->text('items');
            $table->text('remarks');
            $table->timestamps();

            $table->foreign('person_id')
            ->references('id')
            ->on('persons')
            ->onUpdate('cascade')
            ->onDelete('restrict'); 

            $table->foreign('vehicle_person_id')
            ->references('id')
            ->on('vehicle_person')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            $table->foreign('appointment_id')
            ->references('id')
            ->on('appointments')
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
        Schema::dropIfExists('inspections');
    }
}
