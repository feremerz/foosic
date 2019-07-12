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
            $table->string('engName');
            $table->date('release_date');
            $table->text('lyrics')->nullable();
            $table->bigInteger('likeCount')->default(0);
            $table->bigInteger('viewCount')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('is_album')->default(0);
            $table->Integer('price')->default(0);
            $table->integer('duration')->unsigned()->default(0); //millisecond
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('slug');
            $table->unsignedBigInteger('album_id')->nullable();
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
