<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('part_id')->unsigned();
            $table->integer('step_id')->unsigned();
            $table->integer('job_order_id')->unsigned();
            $table->integer('quantity');
            $table->timestamps();

            $table->foreign('part_id')
            ->references('id')
            ->on('parts')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            $table->foreign('step_id')
            ->references('id')
            ->on('steps')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            $table->foreign('job_order_id')
            ->references('id')
            ->on('joborders')
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
        Schema::dropIfExists('materials');
    }
}
