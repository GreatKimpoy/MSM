<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('steps', function (Blueprint $table) {
            $table->increments('StepId');
            $table->unsignedInteger('ServiceId');
            $table->mediumText('txtDescription');

         if(Schema::hasTable('services')){
                $table->foreign('ServiceId')
                  ->references('ServiceId')
                  ->on('services')
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
        Schema::dropIfExists('steps');
    }
}
