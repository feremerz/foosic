<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->date('release_date');
            $table->text('lyrics');
            $table->bigInteger('likeCount')->default(0);
            $table->bigInteger('viewCount')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->integer('duration')->unsigned()->default(0); //millisecond

            $table->string('slug');
            $table->unsignedBigInteger('album_id');
            $table->softDeletes();

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
        Schema::dropIfExists('songs');
    }
}
