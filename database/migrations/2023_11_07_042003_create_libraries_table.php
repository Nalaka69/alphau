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
        Schema::create('libraries', function (Blueprint $table) {
            $table->id();
            $table->string('program_name');
            $table->string('episode');
            $table->date('episode_date');
            $table->time('episode_time');
            $table->string('is_visible');
            $table->string('program_directory');
            $table->string('program_file')->nullable();
            $table->time('duration')->nullable();
            $table->integer('archive_id');
            $table->string('category_name');
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
        Schema::dropIfExists('libraries');
    }
};
