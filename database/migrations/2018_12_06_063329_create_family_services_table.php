<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamilyServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family_services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fsc_id')->comment('所属分类id');
            $table->string('title')->comment('标题');
            $table->text('content')->comment('内容');
            $table->tinyInteger('tagStatus')->comment('标记状态');
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
        Schema::dropIfExists('family_services');
    }
}
