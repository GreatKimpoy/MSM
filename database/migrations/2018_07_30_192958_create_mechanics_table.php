<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMechanicsTable extends Migration
{
    /**
     * Run the migrations
.     *
     * @return void
     */
    public function up()
    {
        Schema::create('mechanics', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('MechanicId');
            $table->unsignedInteger('CategoryId');
            $table->string('strFirstName', 45);
            $table->string('strMiddleName', 45);
            $table->string('strLastName', 45);
            $table->text('txtStreet');
            $table->text('txtBrgy');
            $table->text('txtCity');
            $table->date('dtmBirthdate');
            $table->string('strContact', 30);
            $table->string('strEmail')->nullable();
            $table->text('image')->nullable();
            $table->unique(['strFirstName', 'strMiddleName','strLastName']);
            $table->boolean('isActive')->default(1);


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
        Schema::dropIfExists('mechanics');
    }
}
