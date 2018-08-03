<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parts', function (Blueprint $table) {
            $table->increments('PartId');
            $table->string('strPartNo');
            $table->unsignedInteger('VehicleId');
            $table->string('strPartLocation');
            $table->string('strPartDescription');
            $table->float('fltPartPrice', 8,2);

            if(Schema::hasTable('vehicle_types')){
                $table->foreign('VehicleId')
                  ->references('VehicleId')
                  ->on('vehicle_types')
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
        Schema::dropIfExists('parts');
    }
}
