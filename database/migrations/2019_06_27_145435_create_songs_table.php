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
            $table->unsignedBigInteger('singer_id');
            //$table->foreign('singer_id')->references('id')->on('singers');
            $table->string('name');
            $table->string('imageUrl');
            $table->text('lyrics');
            $table->bigInteger('likeCount')->default(0);
            $table->bigInteger('dislikeCount')->default(0);
            $table->bigInteger('viewCount')->default(0);
            $table->tinyInteger('status')->default(1);

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
