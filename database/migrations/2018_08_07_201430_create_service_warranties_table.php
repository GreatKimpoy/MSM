<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceWarrantiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_warranties', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_service_id')->unsigned();
            $table->integer('service_id')->unsigned();
            $table->integer('warranty_id')->unsigned();
            $table->timestamps();

            $table->foreign('job_service_id')
            ->references('id')
            ->on('job_services')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            $table->foreign('service_id')
            ->references('id')
            ->on('services')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            $table->foreign('warranty_id')
            ->references('id')
            ->on('job_warranties')
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
        Schema::dropIfExists('service_warranties');
    }
}
