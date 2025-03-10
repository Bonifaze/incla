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
        Schema::create('grade_settings', function (Blueprint $table) {
            $table->id();
            $table->float('min_score');
            $table->float('max_score');
            $table->string('grade');
            $table->float('point');
            $table->enum('status', ['pass', 'fail']);
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
        Schema::dropIfExists('grade_settings');
    }
};
