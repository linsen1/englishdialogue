<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDialogueWordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dialogue_words', function (Blueprint $table) {
            $table->increments("id");
            $table->string("words_text",1000);
            $table->string("words_pic",1000);
            $table->string("words_audio",1000);
            $table->integer("words_order")->default(1);
            $table->boolean('words_is_translate')->default(true);
            $table->string('words_subtitle')->nullable();
            $table->timestamps();

            $table->unsignedInteger('dialogue_base_id');
            $table->foreign('dialogue_base_id')->references('id')->on('dialogue_bases');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dialogue_words');
    }
}
