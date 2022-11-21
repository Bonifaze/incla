<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programme_courses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('programme_id')->unsigned();
            $table->bigInteger('course_id')->unsigned();
            $table->bigInteger('level')->unsigned();
            $table->bigInteger('semester')->unsigned();
            $table->enum('course_type', ['core', 'elective']);
            $table->enum('has_pre_requisite', ['yes', 'no']);
            $table->bigInteger('pre_requisite_id')->unsigned()->nullable();
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
        Schema::dropIfExists('programme_courses');
    }
};
