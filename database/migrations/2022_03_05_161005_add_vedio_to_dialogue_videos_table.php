<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVedioToDialogueVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dialogue_videos', function (Blueprint $table) {
            $table->string('video_mp3_url',150)->after('video_url');
            $table->text('video_englishChinese_words')->after('video_url');
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dialogue_videos', function (Blueprint $table) {
            //
        });
    }
}
