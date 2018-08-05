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
            $table->increments('id');
            $table->string('part_number');
            $table->integer('vehicle_id')->unsigned();
            $table->string('part_location');
            $table->string('description');
            $table->double('price', 8,2);

        
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
        Schema::dropIfExists('parts');
    }
}
