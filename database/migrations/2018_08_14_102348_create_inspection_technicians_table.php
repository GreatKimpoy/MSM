<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInspectionTechniciansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspection_technicians', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('inspection_id')->unsigned();
            $table->integer('technician_id')->unsigned();
            $table->foreign('inspection_id')
                    ->references('id')
                    ->on('inspections')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('technician_id')
                    ->references('id')
                    ->on('technicians')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('inspection_technicians');
    }
}
