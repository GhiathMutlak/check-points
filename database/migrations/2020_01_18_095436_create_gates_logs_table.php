<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGatesLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gates_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->bigInteger('person_id')->unsigned();
            $table->bigInteger('gate_id')->unsigned();
            $table->string('direction');
        });


        Schema::table('gates_logs', function (Blueprint $table) {
            $table->foreign('person_id')
                  ->references('id')
                  ->on('people');
        });

        Schema::table('gates_logs', function (Blueprint $table) {
            $table->foreign('gate_id')
                  ->references('id')
                  ->on('gates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gates_logs');
    }
}
