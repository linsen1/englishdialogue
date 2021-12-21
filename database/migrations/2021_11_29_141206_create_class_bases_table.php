<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassBasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_bases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('class_name',150);
            $table->string('class_pic',1000);
            $table->integer('class_order')->default(1); //数字越大越靠前
            $table->integer('class_type')->default(0); // 0 对话
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
        Schema::dropIfExists('class_bases');
    }
}
