<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLernfelderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lernfelder', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number');
            $table->string('name');
            $table->integer('schulformId')->unsigned();
            $table->integer('year');
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
        Schema::dropIfExists('lernfelder');
    }
}
