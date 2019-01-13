<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAwardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('awards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('photo')->nullable()->comment('图片');
            $table->string('name')->nullable()->comment('名称');
            $table->string('remark')->nullable()->comment('备注');
            $table->string('time')->nullable()->comment('时间');
            $table->string('introduction')->nullable()->comment('正文');
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
        Schema::dropIfExists('awards');
    }
}
