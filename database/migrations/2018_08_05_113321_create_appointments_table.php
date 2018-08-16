<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('person_id')->unsigned();
            $table->date('appointment_name');
            $table->date('appointment_startDate');
            $table->date('production_endDate');
            $table->timestamps();

            $table->foreign('person_id')
                ->references('id')
                ->on('persons')
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
        Schema::dropIfExists('appointments');
    }
}
