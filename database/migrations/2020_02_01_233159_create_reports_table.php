<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->string('name', 255)->nullable();
            $table->string('mia_centre_name')->nullable();
            $table->string('date')->nullable();
            $table->string('attendace')->nullable();
            $table->string('class_total')->nullable();
            $table->string('mia_course')->nullable();
            $table->longText('lesson_note')->nullable();
            $table->longText('subject', 255)->nullable();
            $table->longText('report_statement')->nullable();
            $table->longText('challenges')->nullable();
            $table->longText('suggestions')->nullable();
            $table->string('file')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reports');
    }
}
