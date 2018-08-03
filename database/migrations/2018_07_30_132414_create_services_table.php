<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('ServiceId');
            $table->unsignedInteger('CategoryId');
            $table->string('strServiceName');
            $table->string('strValidity');
            $table->text('strServiceDescription');
            $table->float('fltPrice', 8,2);
            $table->string('dtmEstimateTime');
            $table->string('dtmActualTime');

           if (Schema::hasTable('service_categories')){
                $table->foreign('CategoryId')
                  ->references('CategoryId')
                  ->on('service_categories')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');
           }

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
