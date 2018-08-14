<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInspectionActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspection_activities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('details');
            $table->string('status');
            $table->integer('mechanic_id')->unsigned();
            $table->foreign('mechanic_id')
                    ->references('id')
                    ->on('persons')
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
        Schema::dropIfExists('inspection_activities');
    }
}
