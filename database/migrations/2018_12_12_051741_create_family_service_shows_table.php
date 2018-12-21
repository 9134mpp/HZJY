<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamilyServiceShowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family_service_shows', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fs_id')->comment('所属id');
            $table->string('name')->comment('姓名');
            $table->string('tel')->comment('手机号');
            $table->string('note')->comment('备注');
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
        Schema::dropIfExists('family_service_shows');
    }
}
