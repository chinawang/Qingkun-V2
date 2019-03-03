<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPhotoToProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('photo_large_6')->nullable()->comment('大图1');
            $table->string('photo_large_7')->nullable()->comment('大图2');
            $table->string('photo_large_8')->nullable()->comment('大图3');
            $table->string('photo_large_9')->nullable()->comment('大图4');
            $table->string('photo_large_10')->nullable()->comment('大图5');
            $table->string('photo_large_11')->nullable()->comment('大图1');
            $table->string('photo_large_12')->nullable()->comment('大图2');
            $table->string('photo_large_13')->nullable()->comment('大图3');
            $table->string('photo_large_14')->nullable()->comment('大图4');
            $table->string('photo_large_15')->nullable()->comment('大图5');
            $table->string('photo_large_16')->nullable()->comment('大图1');
            $table->string('photo_large_17')->nullable()->comment('大图2');
            $table->string('photo_large_18')->nullable()->comment('大图3');
            $table->string('photo_large_19')->nullable()->comment('大图4');
            $table->string('photo_large_20')->nullable()->comment('大图5');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            //
        });
    }
}
