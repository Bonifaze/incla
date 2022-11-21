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
        Schema::create('staff_courses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('staff_id')->unsigned();
            $table->bigInteger('course_id')->unsigned();
            $table->bigInteger('session_id')->unsigned();
            $table->bigInteger('level');
            $table->bigInteger('semester');
            $table->enum('upload_status', ['uploaded', 'not uploaded'])->default('not uploaded');
            $table->enum('approval_status', ['pending', 'approved', 'declined'])->default('pending');
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
        Schema::dropIfExists('staff_courses');
    }
};
