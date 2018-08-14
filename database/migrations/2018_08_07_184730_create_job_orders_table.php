<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('person_id')->unsigned();
            $table->integer('vehicle_id')->unsigned();
            $table->integer('inspection_id')->unsigned();
            $table->integer('appointment_id')->unsigned();
            $table->date('date_received');
            $table->time('time_started');
            $table->time('time_finished');
            $table->date('date_released');
            $table->text('remarks');
            $table->timestamps();

            $table->foreign('person_id')
            ->references('id')
            ->on('persons')
            ->onUpdate('cascade')
            ->onDelete('restrict'); 

            $table->foreign('vehicle_id')
            ->references('id')
            ->on('vehicles')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            $table->foreign('appointment_id')
            ->references('id')
            ->on('appointments')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            $table->foreign('inspection_id')
            ->references('id')
            ->on('inspections')
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
        Schema::dropIfExists('job_orders');
    }
}
