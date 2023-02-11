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
        Schema::create('batch_trackers', function (Blueprint $table) {
            $table->id();
            $table->string('batch_id');
            $table->unsignedBigInteger('program_id');
            $table->unsignedBigInteger('session');
            $table->integer('level');
            $table->integer('semester');
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
        Schema::dropIfExists('batch_trackers');
    }
};
