<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table) {
            $table->foreign('classId')
                ->references('id')->on('classes')
                ->onDelete('restrict');

            $table->foreign('schulformId')
                ->references('id')->on('schulform')
                ->onDelete('restrict');
        });

        Schema::table('events', function($table) {
            $table->foreign('lernfeldId')
                ->references('id')->on('lernfelder')
                ->onDelete('restrict');

            $table->foreign('timeslotId')
                ->references('id')->on('timeslots')
                ->onDelete('restrict');

            $table->foreign('creatorId')
                ->references('id')->on('users')
                ->onDelete('restrict');
        });

        Schema::table('timeslots', function($table) {
            $table->foreign('lernfeldId')
                ->references('id')->on('lernfelder')
                ->onDelete('restrict');

            $table->foreign('classId')
                ->references('id')->on('classes')
                ->onDelete('restrict');
        });

        Schema::table('event_users_relation', function($table) {
            $table->foreign('eventId')
                ->references('id')->on('events')
                ->onDelete('restrict');

            $table->foreign('userId')
                ->references('id')->on('users')
                ->onDelete('restrict');
        });

        Schema::table('lernfelder', function($table) {
            $table->foreign('schulformId')
                ->references('id')->on('schulform')
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
        //
    }
}
