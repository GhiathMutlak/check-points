<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecurityRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('security_records', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->bigInteger('person_id')->unsigned();
            $table->string('title');
            $table->string('explanation')->nullable();
            $table->date('date')->nullable();
            $table->string('place')->nullable();
            $table->boolean('wanted');
        });

        Schema::table('security_records', function (Blueprint $table) {
            $table->foreign('person_id')
                  ->references('id')
                  ->on('people');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('security_records');
    }
}
