<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobWarrantiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_warranties', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_order_id')->unsigned();
            $table->integer('vehicle_part_id')->unsigned();
            $table->timestamps();

            $table->foreign('job_order_id')
            ->references('id')
            ->on('job_orders')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            $table->foreign('vehicle_part_id')
            ->references('id')
            ->on('vehicle_parts')
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
        Schema::dropIfExists('job_warranties');
    }
}
