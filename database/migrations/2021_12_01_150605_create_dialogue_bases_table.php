<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDialogueBasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dialogue_bases', function (Blueprint $table) {
            $table->increments('id');

            $table->string('dialogue_title',150);
            $table->string('dialogue_pic',1000);
            $table->integer('dialogue_order')->default(1);
            $table->integer('dialogue_sentence_count')->default(1);
            $table->timestamps();

            $table->unsignedInteger('class_base_id');
            $table->foreign('class_base_id')->references('id')->on('class_bases');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dialogue_bases');
    }
}
