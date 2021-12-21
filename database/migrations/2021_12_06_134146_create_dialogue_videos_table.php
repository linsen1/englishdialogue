<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDialogueVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dialogue_videos', function (Blueprint $table) {
            $table->id();
            $table->string("video_image",150);
            $table->string("video_url",150);
            $table->string("english_subtitle",150)->nullable();
            $table->string("chinese_subtitle",150)->nullable();
            $table->integer("video_time");
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
        Schema::dropIfExists('dialogue_videos');
    }
}
