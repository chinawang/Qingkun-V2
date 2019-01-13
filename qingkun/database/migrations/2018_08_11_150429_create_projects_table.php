<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable()->comment('名称');
            $table->string('abstract')->nullable()->comment('摘要、简介');
            $table->string('introduction')->nullable()->comment('正文');
            $table->string('photo_large_1')->nullable()->comment('大图1');
            $table->string('photo_large_2')->nullable()->comment('大图2');
            $table->string('photo_large_3')->nullable()->comment('大图3');
            $table->string('photo_large_4')->nullable()->comment('大图4');
            $table->string('photo_large_5')->nullable()->comment('大图5');
            $table->string('photo_small_1')->nullable()->comment('小图1');
            $table->string('photo_small_2')->nullable()->comment('小图2');
            $table->string('photo_small_3')->nullable()->comment('小图3');
            $table->string('photo_small_4')->nullable()->comment('小图4');
            $table->string('photo_small_5')->nullable()->comment('小图5');
            $table->string('provence')->nullable()->comment('省');
            $table->string('address')->nullable()->comment('地址');
            $table->string('design_time')->nullable()->comment('设计时间');
            $table->string('build_time')->nullable()->comment('建成时间');
            $table->string('type')->nullable()->comment('类型');
            $table->string('size')->nullable()->comment('规模');
            $table->tinyInteger('delete_process')->default(0)->comment('是否删除');
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
        Schema::dropIfExists('projects');
    }
}
