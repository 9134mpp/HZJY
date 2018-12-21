<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public_classes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('img')->comment('图片封面');
            $table->string('video')->comment('视频链接');
            $table->string('title')->comment('课程标题');
            $table->text('content')->comment('课程详情');
            $table->text('teacher')->comment('名师介绍');
            $table->integer('onclick')->comment('点击率');
            $table->tinyInteger('status')->comment('状态');
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
        Schema::dropIfExists('public_classes');
    }
}
