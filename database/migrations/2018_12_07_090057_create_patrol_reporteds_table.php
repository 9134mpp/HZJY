<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatrolReportedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patrol_reporteds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('prc_id')->comment('所属分类id');
            $table->string('title')->comment('标题');
            $table->text('content')->comment('内容');
            $table->date('date')->comment('日期');
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
        Schema::dropIfExists('patrol_reporteds');
    }
}
