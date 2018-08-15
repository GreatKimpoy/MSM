<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobOrderActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_order_activities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_order_id')->unsigned();
            $table->longtext('details');
            $table->string('title');
            $table->integer('person_id')->unsigned();
            $table->foreign('person_id')
                ->references('id')
                ->on('persons')
                ->onUpdate('cascade')
                ->onDelete('restrict'); 
            $table->integer('created_by')->unsigned();
            $table->foreign('created_by')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('restrict'); 
            $table->foreign('job_order_id')
                ->references('id')
                ->on('job_orders')
                ->onUpdate('cascade')
                ->onDelete('restrict');
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
        Schema::dropIfExists('job_order_activities');
    }
}
